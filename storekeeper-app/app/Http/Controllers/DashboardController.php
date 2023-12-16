<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $yesterday = Carbon::yesterday();
        $todaySales = Sale::whereDate('date', today())->sum('amount');
        $yesterdaySales = Sale::whereDate('date', $yesterday)->sum('amount');
        $thisMonthSales = Sale::whereMonth('date', today()->month)->sum('amount');
        $lastMonthSales = Sale::whereMonth('date', today()->subMonth())->sum('amount');

        return view('dashboard.index', compact('todaySales', 'yesterdaySales', 'thisMonthSales', 'lastMonthSales'));
    }
}