<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::create([
            'name' => 'Your time is limited…',
            'slug' => Str::slug('Your time is limited…'),
            'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
             sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
             Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum',
            'content' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
            sed diam nonummy nibh euismod tincidunt ut laoreet
            dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
             quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.',
            'image' => 'https://woodstock.temashdesign.me/watch/wp-content/uploads/sites/3/2016/02/watch-content-06-1024x682.jpg',
            'is_draft' => '1'
        ]);
        Blog::create([
            'name' => 'Tour of Envato’s Melbourne Headquarters',
            'slug' => Str::slug('Tour of Envato’s Melbourne Headquarters'),
            'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
             quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.',
            'content' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
            sed diam nonummy nibh euismod tincidunt ut laoreet
            dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
             quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.',
            'image' =>
            'https://woodstock.temashdesign.me/watch/wp-content/uploads/sites/3/2016/02/watch-content-06-1024x682.jpg',
            'is_draft' => '1'
        ]);
        Blog::create([
            'name' => 'TemashDesign Portfolio',
            'slug' =>  Str::slug('TemashDesign Portfolio'),
            'description' => '',
            'content' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
            sed diam nonummy nibh euismod tincidunt ut laoreet
            dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
             quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.',
            'image' =>
            'https://woodstock.temashdesign.me/watch/wp-content/uploads/sites/3/2016/02/watch-content-06-1024x682.jpg',
            'is_draft' => '0'
        ]);
        Blog::create([
            'name' => 'Echo Three to Echo Seven', 'slug' => Str::slug('Echo Three to Echo Seven'),
            'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
             quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.',
            'content' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
            sed diam nonummy nibh euismod tincidunt ut laoreet
            dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
             quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.',
            'image' =>
            'https://woodstock.temashdesign.me/watch/wp-content/uploads/sites/3/2016/02/watch-content-06-1024x682.jpg',
            'is_draft' => '1'
        ]);
        Blog::create([
            'name' => 'Oh, Princess Leia, are you all right?', 'slug' =>  Str::slug('Oh, Princess Leia, are you all right?'),
            'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
             quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.',
            'content' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
            sed diam nonummy nibh euismod tincidunt ut laoreet
            dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
             quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.',
            'image'
            => 'https://woodstock.temashdesign.me/watch/wp-content/uploads/sites/3/2016/02/watch-content-06-1024x682.jpg',
            'is_draft' => '1'
        ]);
    }
}