<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;



class AdminOrdersController extends Controller
{
    public function index(Request $request)
    {
        // BASE QUERY (все фильтры + search)
        $baseQuery = Order::query()
            ->with(['user', 'items'])

            // SEARCH (ID или имя пользователя)
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($sub) use ($request) {
                    $sub->where('id', $request->search)
                        ->orWhereHas('user', function ($q) use ($request) {
                            $q->where('name', 'like', "%{$request->search}%");
                        });
                });
            })

            // STATUS FILTER
            ->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
            })

            // DATE FROM
            ->when($request->date_from, function ($query) use ($request) {
                $query->whereDate('created_at', '>=', $request->date_from);
            })

            // DATE TO
            ->when($request->date_to, function ($query) use ($request) {
                $query->whereDate('created_at', '<=', $request->date_to);
            })

            // MIN PRICE
            ->when($request->min_price, function ($query) use ($request) {
                $query->where('total_price', '>=', $request->min_price);
            })

            // MAX PRICE
            ->when($request->max_price, function ($query) use ($request) {
                $query->where('total_price', '<=', $request->max_price);
            });

        // ================= TABLE =================
        $orders = (clone $baseQuery)
            ->latest()
            ->paginate(20)
            ->withQueryString();

        // ================= STATS =================
        $statsQuery = clone $baseQuery;

        $totalOrders = (clone $statsQuery)->count();

        // Эти карточки пусть показывают общую картину за всё время (или тоже привяжите к $statsQuery по желанию)
        $todayOrders = Order::whereDate('created_at', today())->count();
        $monthOrders = Order::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();
        $monthRevenue = Order::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->sum('total_price');
        $averageCheck = Order::avg('total_price');
        $cancelledOrders = Order::where('status', 'cancelled')->count();

        // ================= DYNAMIC CHART DATA =================
        // Теперь график строится С УЧЕТОМ фильтров менеджера!
        $ordersByDay = (clone $baseQuery)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $labels = $ordersByDay->pluck('date')->toArray();
        $values = $ordersByDay->pluck('count')->toArray();

        // ЕСЛИ ЭТО AJAX ЗАПРОС (нажата кнопка Фильтр или пагинация)
        // ... весь код сборки запроса, подсчета stats и графика остается прежним ...

        // ЕСЛИ ЭТО AJAX ЗАПРОС
        if ($request->ajax()) {
            return response()->json([
                // Рендерим ТОЛЬКО изолированный файл таблицы!
                'table_html' => view('admin.orders.table', compact('orders'))->render(),
                'labels' => $labels,
                'values' => $values,
                'total_orders' => $totalOrders
            ]);
        }

        // Обычная загрузка страницы
        return view('admin.orders.index', compact(
            'orders', 'totalOrders', 'todayOrders', 'monthOrders',
            'monthRevenue', 'averageCheck', 'cancelledOrders', 'labels', 'values'
        ));
    }
    public function search(Request $request)
    {
        $q = $request->get('q');

        $orders = Order::with('user')

            ->when($q, function ($query) use ($q) {

                $query->where(function ($sub) use ($q) {

                    $sub->where('id', $q)
                        ->orWhereHas('user', function ($q2) use ($q) {
                            $q2->where('name', 'like', "%{$q}%");
                        });

                });

            })

            ->latest()
            ->limit(20)
            ->get();

        return response()->json($orders);
    }
    public function export(Request $request)
    {
        return Excel::download(
            new OrdersExport($request),
            'orders.xlsx'
        );
    }


    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,processing,shipped,completed,cancelled',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return response()->json([
            'success' => true,
            'status' => $order->status,
        ]);
    }
}
