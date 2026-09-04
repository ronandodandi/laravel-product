<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();

        $products = Product::select( 'ID', 'NamaProduk', 'Qty')
            ->orderBy('ID')
            ->get();

        return view('dashboard', compact(
            'totalUsers',
            'totalProducts',
            'products'
        ));
    }//
}
