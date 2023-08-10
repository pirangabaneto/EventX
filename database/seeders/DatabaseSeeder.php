<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(SalaoSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(EstruturaSeeder::class);
        $this->call(ReservaSeeder::class);
    }
}
