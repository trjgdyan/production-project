<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QcController extends Controller
{
    public function menu()
    {
        return view('qc.menu');
    }
}
