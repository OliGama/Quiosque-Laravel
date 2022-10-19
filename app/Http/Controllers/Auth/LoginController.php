<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\UserService;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,

        ];

        $userAtivo = User::where('email', $request->email)->first('ativo');

        if ($userAtivo) {
            if ($userAtivo->ativo == false) {
                return redirect()
                    ->route('auth.welcome')
                    ->with('warning', 'Autenticação falhou, usuário desativado!');
            }
        }
        

        if (Auth::attempt($credentials)) {
            $userRole = auth()->user()->role;
            return redirect(UserService::getDashboardRouteBasedOnUserRole($userRole));
        }
        return redirect()
            ->route('auth.welcome')
            ->with('warning', 'Autenticação falhou')
            ->withInput();
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
        
    }
}
