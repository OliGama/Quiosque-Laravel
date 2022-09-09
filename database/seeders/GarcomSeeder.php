<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GarcomSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */

    public function run()
    {
        User::create([
            'name' => 'Djalma Garcom',
            'email' => 'djalma@garcom.com',
            'password' => '12345678',
            'role' => 'garcom'
        ]);
    }
}
