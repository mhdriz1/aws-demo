<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\Request;

class DashboardController
{

    public function index(Request $request) {

        return view('dashboard');
    }

}
