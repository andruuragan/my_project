<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserOrderController extends Controller
{
    public function index(User $user, Request $request)
    {
        $orders = $user->orders()
            ->with('items')
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->latest()
            ->get(); // или ->paginate(15);

        return view('admin.users.orders', compact('user', 'orders'));
    }
}
