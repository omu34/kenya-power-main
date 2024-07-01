<?php

namespace Database\Seeders;

use App\Models\FeaturedNews;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeaturedNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $featuredNews = [
            'featured' => 'Featured',
            'button_text' => 'Show Me More',
            'day' => 'Mar 16, 2020',
            'views' => '345 ',
            'description' => 'The  Summit on Clean Cooking in Africa 2024 (Paris, France)',
            'file'=>'test-1.jpg',
            'featured_content'=>'featured pages'
        ];

        $featuredPageData = $featuredNews;

        $featuredPageData['featured_content'] = "Sample content for the main page";

        FeaturedNews::create($featuredPageData);
    }
}
