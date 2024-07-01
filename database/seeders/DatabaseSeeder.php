<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {



        $this->call([
            HeaderNavigationSeeder::class,
            BasicBannerSeeder::class,
            FeaturedNewsSeeder::class,
            LatestVideosSeeder::class,
            LatestNewsSeeder::class,
            LatestGallerySeeder::class,
            BannerSeeder::class,
            BreadcrumbSeeder::class,
            TagsSeeder::class,
            SearchSeeder::class,
            FooterSeeder::class,
        ]);
    }
}
