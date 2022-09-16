<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Mesa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MesasSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */

    public function run()
    {

           for($i=1; $i < 11; $i++) {
            Mesa::create([
                "numero" => "mesa " .$i,
                "ocupada" =>  false

         ]);
           }

    }
}
