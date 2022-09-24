<?php

namespace App\Http\Controllers\Garcom\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        return view('garcom.dashboard.index');
    }

    public function destroy($garcons)
    {
        $users = User::find($garcons);
        $users->delete();
        return back()->with('success', 'Garçom deletado com sucesso!');
    }

    public function desativar($garcons)
    {
        $users = User::find($garcons);
        $users->update(['ativo' => false]);

        return back()->with('success', 'Garçom foi desativado com sucesso!');
    }

    public function ativar($garcons)
    {
        $users = User::find($garcons);
        $users->update(['ativo' => true]);

        return back()->with('success', 'Garçom foi ativado com sucesso!');
    }
}

