<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            SettingSeeder::class,
            BlogSeeder::class,
            TagSeeder::class,
            PostTagTableSeeder::class,
            SliderSeeder::class,
            PostTagTableSeeder::class,
            LogoSeeder::class,
            AboutUsSeeder::class,

        ]);
    }
}
