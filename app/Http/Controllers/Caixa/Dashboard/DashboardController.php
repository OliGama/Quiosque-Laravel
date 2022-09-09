<?php

namespace App\Http\Controllers\Caixa\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('caixa.dashboard.index');
    }
}
