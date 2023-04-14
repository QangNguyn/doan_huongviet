<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'title' => 'Apple watch hermès',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit
                  temporibus, omnis vel quia doloremque minus possimus mollitia
                  vero consectetur sunt, corrupti non consequatur eum voluptates
                  exercitationem nisi iure repellat consequuntur!',
            'text_color' => '#fff',
            'url_btn' => '/',
            'content_btn' => 'Xem ngay',
            'image' => 'https://woodstock.temashdesign.me/watch/wp-content/uploads/sites/3/2016/03/apwatch-01.jpg',
        ]);
        Slider::create([
            'title' => 'ceramic',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit
                  temporibus, omnis vel quia doloremque minus possimus mollitia
                  vero consectetur sunt, corrupti non consequatur eum voluptates
                  exercitationem nisi iure repellat consequuntur!',
            'text_color' => '#fff',
            'url_btn' => '/',
            'content_btn' => 'Xem ngay',
            'image' => 'https://woodstock.temashdesign.me/watch/wp-content/uploads/sites/3/2016/03/patrimony-01.jpg',
        ]);
        Slider::create([
            'title' => 'ceramic',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit
                  temporibus, omnis vel quia doloremque minus possimus mollitia
                  vero consectetur sunt, corrupti non consequatur eum voluptates
                  exercitationem nisi iure repellat consequuntur!',
            'text_color' => '#fff',
            'url_btn' => '/',
            'content_btn' => 'Xem ngay',
            'image' => 'https://woodstock.temashdesign.me/watch/wp-content/uploads/sites/3/2016/03/apwatch-01.jpg',
        ]);
        Slider::create([
            'title' => 'Apple watch hermès',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit
                  temporibus, omnis vel quia doloremque minus possimus mollitia
                  vero consectetur sunt, corrupti non consequatur eum voluptates
                  exercitationem nisi iure repellat consequuntur!',
            'text_color' => '#fff',
            'url_btn' => '/',
            'content_btn' => 'Xem ngay',
            'image' => 'https://woodstock.temashdesign.me/watch/wp-content/uploads/sites/3/2016/03/patrimony-01.jpg',
        ]);
    }
}
