<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $usrLevel = Auth::user()->class;
        // dd($usrLevel);
        if ($usrLevel == 1) {
            return view('dashboard');
        } else if ($usrLevel == 2) {
            return view('menu_admin');
        } else if ($usrLevel == 3) {
            return view('qc.menu');
        }
    }
}
