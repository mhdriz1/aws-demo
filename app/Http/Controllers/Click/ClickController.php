<?php

namespace App\Http\Controllers\Click;

use Illuminate\Support\Facades\Request;

class ClickController
{

    public function lambda(Request $request) {

        return view('dashboard');
    }

}
