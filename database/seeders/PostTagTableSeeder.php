<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Tag;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = Blog::all();
        $tags = Tag::all();


        foreach ($blogs as $blog) {
            $blog->tags()->attach($tags->random(2)->pluck('id')->toArray());
        }
    }
}
