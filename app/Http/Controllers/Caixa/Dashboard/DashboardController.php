<?php

namespace App\Http\Controllers\Caixa\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $garcons = User::whereRole('garcom')->get();
        return view('caixa.dashboard.index', compact('garcons'));
    }
}
