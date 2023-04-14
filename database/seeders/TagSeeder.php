<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            "name" => "T-Shirt",
            "slug"=>'t-shirt',
            "description" => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit"
        ]);
        Tag::create([
            "name" => "Brown",
            "slug"=>'brown',
            "description" => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit"
        ]);
        Tag::create([
            "name" => "Travel",
            "slug"=>'travel',
            "description" => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit"
        ]);
        Tag::create([
            "name" => "Fashion",
            "slug"=>'fashion',
            "description" => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit"
        ]);
        Tag::create([
            "name" => "Asian",
            "slug"=>'asian',
            "description" => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit"
        ]);
        Tag::create([
            "name" => "White",
            "slug" => "white",
            "description" => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit"
        ]);
    }
}
