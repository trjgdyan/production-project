<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'noreg' => '123456',
            'name' => 'Tri Jagad Ariyani',
            'class' => '1',
            'department' => 'IT',
            'password' => bcrypt('password'),

        ]);
    }
}
