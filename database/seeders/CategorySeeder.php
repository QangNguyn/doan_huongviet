<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Đồng hồ thời trang Nam',
            'slug' => 'dong-ho-deo-tay-nam',
            'parent_id' => '0',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit',
            'image' => 'https://www.dangquangwatch.vn/upload/product_small/1943073422_dong-ho-thuy-sy99.jpg'
        ]);

        Category::create([
            'name' => 'ĐỒNG HỒ CAO CẤP',
            'slug' => 'dong-ho-cao-cap',
            'parent_id' => '0',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit',
            'image' => 'https://woodstock.temashdesign.me/watch/wp-content/uploads/sites/3/2016/03/moto360-01-350x350.jpg'
        ]);
        Category::create([
            'name' => 'Đồng hồ thời trang Nữ',
            'slug' => 'dong-ho-deo-tay-nu',
            'parent_id' => '0',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit',
            'image' => 'https://woodstock.temashdesign.me/watch/wp-content/uploads/sites/3/2016/03/apwatch-01-350x350.jpg'
        ]);

        Category::create([
            'name' => 'Đồng hồ thời trang Cặp đôi',
            'slug' => 'dong-ho-deo-tay-cap-doi',
            'parent_id' => '0',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit',
            'image' => 'https://www.dangquangwatch.vn/upload/product_small/1484739335_dong-ho-nu34.jpg'
        ]);
    }
}
