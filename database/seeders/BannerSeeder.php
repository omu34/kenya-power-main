<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            'banner_content' => 'KPLC Newsroom',
            'image_path' => 'test-1.jpg', // Removed leading space
        ];

        $banner = $banners;
        $banner['banner_content'] = "News Room";

        Banner::create($banner);
    }
}
