<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(SuperviseurSeeder::class);
        $this->call(DGSeeder::class);
        $this->call(FakePersonnel::class);
    }
}
