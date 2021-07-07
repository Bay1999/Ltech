<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123'),
            'type' => 'admin',
        ]);

        User::create([
            'name' => 'kasir',
            'email' => 'kasir@mail.com',
            'password' => Hash::make('kasir123'),
            'type' => 'kasir',
        ]);
    }
}
