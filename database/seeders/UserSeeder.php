<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'huongvietshop',
        //     'email' => 'huongvietshop@gmail.com',
        //     'password' => Hash::make('12345689'),
        //     'role_as' => '1',
        // ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role_as' => '1',
        ]);
        User::create([
            'name' => 'Lê Dương',
            'email' => 'duongx1801@gmail.com',
            'password' => Hash::make('12345689'),
            'role_as' => '0',
        ]);
    }
}
