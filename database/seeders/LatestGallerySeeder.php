<?php

namespace Database\Seeders;

use App\Models\LatestGallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LatestGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
            'latest_gallery' => 'Latest Gallery',
            'button_text' => 'Show Me More',
            'day' => 'Mar 16, 2020',
            'views' => '345',
            'description' => 'The  Summit on Clean Cooking in Africa 2024 (Paris, France)',
            'file' => '1.jpg',
            'main_page_content' => 'latest gallery pages'
        ];

        $latestGalleryData = $galleries;

        $latestGalleryData['main_page_content'] = "Sample content for the main page";

        LatestGallery::create($latestGalleryData);
    }
}
