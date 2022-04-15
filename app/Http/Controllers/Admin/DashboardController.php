<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\DashboardDataService;

class DashboardController extends Controller
{

    /**
     * Display the Dashboard view
     *
     * @param DashboardDataService $service
     * @return \Illuminate\View\View
     */
    public function index(DashboardDataService $service): \Illuminate\View\View
    {
        return view('admin.dashboard' , $service->getData());
    }

}
