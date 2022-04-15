<?php

namespace App\Services\Admin;

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
        $users = User::where('is_admin' , 0)->count();
        $products = Product::count();
        $categories = Category::count();
        $allOrders = Order::with('products')->get();
        $orders = $allOrders->count();
        $completedOrders = $allOrders->where('status' , 'delivered')->count();
        $cancelledOrders = $allOrders->where('status' , 'cancelled')->count();
        $restoredOrders = $allOrders->where('status' , 'restored')->count();
        $income = $this->getTotalIncome($allOrders->where('status' , 'delivered'));

        return compact('users' , 'products' , 'categories' , 'orders' , 'completedOrders'
            , 'cancelledOrders', 'restoredOrders' , 'income');
    }

    /**
     * Get the total income of the given orders
     *
     * @param $orders
     * @return float|int
     */
    private function getTotalIncome($orders): float|int
    {
        $income = 0;
        foreach($orders as $order){
            foreach($order->products as $product){
                $income += $product->pivot->each_price * $product->pivot->quantity;
            }
        }
        return $income;
    }

}
