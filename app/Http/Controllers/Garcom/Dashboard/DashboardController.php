<?php

namespace App\Http\Controllers\Garcom\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('garcom.dashboard.index');
    }
}
