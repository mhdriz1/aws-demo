<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use Illuminate\Support\Facades\Request;

class DashboardController
{

    public function index(Request $request)
    {
        $products = Product::query()
            ->count(\DB::raw('1'));

        $sellers = Product::query()->toBase()
            ->groupBy('seller_name')
            ->get([
                'seller_name'
            ])
            ->count();

        return view('dashboard', compact('products', 'sellers'));
    }

}
