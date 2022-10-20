<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperviseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "superviseur",
            "email" => "jhimguiyok@gmail.com",
            "password" => Hash::make('password'),
            "role" => "2",
        ]);
    }
}
