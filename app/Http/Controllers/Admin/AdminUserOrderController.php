<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminUserOrderController extends Controller
{
    public function index(User $user)
    {
        $orders = $user->orders()
            ->with('items')
            ->latest()
            ->get();

        return view('admin.users.orders', compact('user', 'orders'));
    }
}
