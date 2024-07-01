<?php

namespace Database\Seeders;

use App\Models\BasicBanner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasicBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $basicBanners= [
            'title' => 'KPLC Newsroom',
            'image_path' => 'test-1.jpg',
            'basic_banner_content' => 'This is a sample content for the banner.',
    ];

    $basicBannerData = $basicBanners;

    $basicBannerData['basic_banner_content'] = "Sample content for the main page";

    BasicBanner::create($basicBannerData);


    }
}
