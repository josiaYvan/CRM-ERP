<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DGSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "DG",
            "email" => "lucgath11@gmail.com",
            "password" => Hash::make('password'),
            "role" => "3",
        ]);
    }
}
