<?php

namespace Database\Seeders;

use App\Models\LatestVideos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LatestVideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $latestVideos = [
            'latest_videos' => 'Latest Videos',
            'button_text' => 'Show Me More',
            'day' => 'Mar 16, 2020',
            'views' => '345',
            'description' => 'The  Summit on Clean Cooking in Africa 2024 (Paris, France)',
            'file'=>'1.jpg',
            'main_page_content'=>'latest videos pages'
        ];

        $latestVideosData = $latestVideos;

        $latestVideosData['main_page_content'] = "Sample content for the main page";

        LatestVideos::create($latestVideosData);
    }
}
