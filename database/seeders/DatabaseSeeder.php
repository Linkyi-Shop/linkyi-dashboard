<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Admin::create([
            'name' => 'Koji Xenpai',
            'email' => 'koji@gmail.com',
            'password' => bcrypt('koji1234'),
            'status' => Admin::STATUS_ACTIVED
        ]);
    }
}
