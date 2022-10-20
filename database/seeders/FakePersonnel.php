<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FakePersonnel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Josia Yvan",
            "email" => "josiayvan@gmail.com",
            "password" => Hash::make('password'),
            "role" => "0",
        ]);
    }
}
