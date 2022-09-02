<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $requestData = $request->validated();

        $requestData['role'] = 'garcom';

        DB::beginTransaction();
        try{
            $user = User::create($requestData);

            DB::commit();

            return redirect()
                    ->route('caixa.dashboard.index')
                    ->with('success', 'Conta do garçom criada com Sucesso!' );
        }catch(\Exception $exception){
            DB::rollback();
            return redirect()
                ->route('auth.register.create')
                ->with('warning', 'Erro a fazer o Cadastro' );
        }


    }
}
