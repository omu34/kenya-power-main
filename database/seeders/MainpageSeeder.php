<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MainPage;

class MainpageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mainPages = [

        'gallery_name'=>'Latest Gallery',
        'featured' => 'Featured',
        'button_text'=>'Show More',
        'latest_news'=>'Latest News',
        'latest_videos' => 'Latest Videos',
        // 'main_page_name13 '=>'',
        // 'main_page_name26 '=>'',
    ];

    $mainPagesData = $mainPages;

    $mainPagesData['main_page_content'] = "Sample content for the main page";

    MainPage::create($mainPagesData);

    }
}
