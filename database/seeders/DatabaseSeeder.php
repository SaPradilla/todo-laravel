<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {        
        // call the seeders
        $this->call(UserSeeder::class);
        $this->call(TodoSeeder::class);
    }
}
