<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CreateOrganizationUser extends Command
{

    protected $signature = 'create:organization-user {numero} {ocupado}';

    protected $description = 'Cria um novo usuário do tipo organização';

    public function __construct(){
        parent::__construct();
    }


    public function handle()
    {
        $numero = $this->argument('numero');
        $ocupado = $this->argument('ocupado');


        User::create([
            'numero' => $numero,
            'ocupado' => $ocupado,
            'role' => 'organization'

        ]);

        $this->info('Usuário cadastrado com sucesso');

        //$this->info($numero);
        //$this->info($ocupado);
    }
}
