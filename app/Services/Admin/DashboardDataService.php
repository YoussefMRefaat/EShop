<?php

namespace App\Services\Admin;

use App\Enums\OrderStatus;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardDataService{

    /**
     * Get the dashboard data
     *
     * @return array
     */
    public function getData(): array
    {
        $users = User::where('role' , 'user')->count();
        $products = Product::count();
        $categories = Category::count();
        $allOrders = Order::with('products')->get();
        $orders = $allOrders->count();
        $completedOrders = $allOrders->where('status' , OrderStatus::Delivered)->count();
        $cancelledOrders = $allOrders->where('status' , OrderStatus::Cancelled)->count();
        $restoredOrders = $allOrders->where('status' , OrderStatus::Restored)->count();
        $income = $allOrders->where('status' , OrderStatus::Delivered)->sum('total_price');

        return compact('users' , 'products' , 'categories' , 'orders' , 'completedOrders'
            , 'cancelledOrders', 'restoredOrders' , 'income');
    }
}
