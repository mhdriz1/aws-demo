<?php

namespace App\Http\Controllers\Product;

use Illuminate\Support\Facades\Request;

class ProductController
{

    public function elasticsearch(Request $request) {

        return view('dashboard');
    }

    public function athena(Request $request) {

        return view('dashboard');
    }

    public function rds(Request $request) {

        return view('dashboard');
    }

    public function dynamodb(Request $request) {

        return view('dashboard');
    }

    public function s3(Request $request) {

        return view('dashboard');
    }

}
