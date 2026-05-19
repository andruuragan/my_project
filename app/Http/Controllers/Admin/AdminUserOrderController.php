<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserOrderController extends Controller
{
    public function index(User $user, Request $request)
    {
        $query = $user->orders()->with('items')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $orders = $query->get();

        return view('admin.users.orders', compact('user', 'orders'));
    }
}
