<?php

namespace Database\Seeders;

use App\Models\SettingLogo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SettingLogo::create([
            'logo' => 'https://htmldemo.net/angara/angara/img/logo/1.png'
        ]);
    }
}
