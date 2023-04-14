<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(
            [
                'key' => 'facebook_link',
                'value' => 'https://www.facebook.com/caolee.thang',
            ]
        );
        Setting::create(
            [
                'key' => 'zalo_link',
                'value' => 'https://chat.zalo.me/',
            ]
        );
        Setting::create(
            [
                'key' => 'phone_number',
                'value' => '0942184889',
            ]
        );
        Setting::create(
            [
                'key' => 'email',
                'value' => 'caothangle@gmail.com',
            ]
        );
        Setting::create(
            [
                'key' => 'location',
                'value' => '9C9 Trần Quốc Hoàn',
            ]
        );
        Setting::create(
            [
                'key' => 'footer_info',
                'value' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque error impedit odit, assumenda est aliquam. Molestiae eligendi quae aspernatur explicabo sequi eaque, amet culpa eos repudiandae dignissimos, odit consectetur magnam!',
            ]
        );
    }
}