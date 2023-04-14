<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'category_id' => '1',
            'name' => 'Đồng hồ Diamond D DM3638L5IG-R',
            'slug' => Str::slug('Đồng hồ Diamond D DM3638L5IG-R'),
            'small_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
            'original_price' => 90000,
            'selling_price' =>  45000,
            'image' => 'https://www.dangquangwatch.vn/upload/img_big/447765850_d1.jpg,
            https://www.dangquangwatch.vn/upload/product/1119721610_dong-ho-nu-thoi-trang.jpg',
            'qty' => '20',
            'status' => 'out_of_stock',
            'trending' => '0',
        ]);
        Product::create([
            'category_id' => '2',
            'name' => 'Đồng hồ Philippe Auguste PA5001A',
            'slug' =>  Str::slug('Đồng hồ Philippe Auguste PA5001A'),
            'small_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
            'original_price' => 98000,
            'selling_price' => 72000,
            'image' =>
            'https://www.dangquangwatch.vn/upload/img_big/447765850_d1.jpg,
            https://www.dangquangwatch.vn/upload/product/1119721610_dong-ho-nu-thoi-trang.jpg',
            'qty' => '20',
            'status' => 'stocking',
            'trending' => '0',
        ]);
        Product::create([
            'category_id' => '3',
            'name' => 'Đồng hồ Q&Q QQ-QA24J102Y',
            'slug' => Str::slug('Đồng hồ Q&Q QQ-QA24J102Y'),
            'small_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
            'original_price' => 50000,
            'selling_price' => 25000,
            'image' =>
            'https://www.dangquangwatch.vn/upload/img_big/447765850_d1.jpg,
            https://www.dangquangwatch.vn/upload/product/1119721610_dong-ho-nu-thoi-trang.jpg',
            'qty' => '20',
            'status' => 'out_of_stock',
            'trending' => '1',
        ]);
        Product::create([
            'category_id' => '4',
            'name' => 'Đồng hồ Q&Q QQ-QA56J402Y',
            'slug' => Str::slug('Đồng hồ Q&Q QQ-QA56J402Y'),
            'small_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
            'original_price' => 55000,
            'selling_price' => 33000,
            'image' =>
            'https://www.dangquangwatch.vn/upload/img_big/447765850_d1.jpg,
            https://www.dangquangwatch.vn/upload/product/1119721610_dong-ho-nu-thoi-trang.jpg',
            'qty' => '20',
            'status' => 'stocking',
            'trending' => '1',
        ]);
        Product::create([
            'category_id' => '2',
            'name' => 'Đồng hồ Q&Q QQ-QA56J402Y',
            'slug' =>  Str::slug('Đồng hồ Q&Q QQ-QA56J402Y'),
            'small_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
            'original_price' => 250000,
            'selling_price' => 120000,
            'image' =>
            'https://www.dangquangwatch.vn/upload/img_big/447765850_d1.jpg,
            https://www.dangquangwatch.vn/upload/product/1119721610_dong-ho-nu-thoi-trang.jpg',
            'qty' => '20',
            'status' => 'stocking',
            'trending' => '1',
        ]);
        Product::create([
            'category_id' => '4',
            'name' => 'Đồng hồ Q&Q QQ-Q949J401Y',
            'slug' => Str::slug('Đồng hồ Q&Q QQ-Q949J401Y'),
            'small_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
            'original_price' => 78000,
            'selling_price' => 65000,
            'image' =>
            'https://www.dangquangwatch.vn/upload/img_big/447765850_d1.jpg,
            https://www.dangquangwatch.vn/upload/product/1119721610_dong-ho-nu-thoi-trang.jpg',
            'qty' => '20',
            'status' => 'stocking',
            'trending' => '1',
        ]);
        Product::create([
            'category_id' => '2',
            'name' => 'Đồng hồ Epos Swiss E-8000.700.28.85.32 Diamond',
            'slug' =>  Str::slug('Đồng hồ Epos Swiss E-8000.700.28.85.32 Diamond'),
            'small_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
            'original_price' => 190000,
            'selling_price' => 150000,
            'image' =>
            'https://www.dangquangwatch.vn/upload/img_big/447765850_d1.jpg,
            https://www.dangquangwatch.vn/upload/product/1119721610_dong-ho-nu-thoi-trang.jpg',
            'qty' => '20',
            'qty' => '20',
            'status' => 'stocking',
            'trending' => '1',
        ]);
    }
}
