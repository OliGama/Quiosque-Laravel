<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
Use App\Models\User;

class CreateCaixaUser extends Command
{

    protected $signature = 'create:caixa-user {name} {email} {password}';


    protected $description = 'Cria um novo Usuário do tipo Caixa';

    public function __construct(){
        parent::__construct();
    }


    public function handle()
    {
        $name  = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => 'caixa'
        ]);

        $this->info('Usuário cadastrado com Sucesso!');

    }
}
