<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Socials;
use App\Nova\Socials as NovaSocials;

class SocialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $socials = [
            ['name' => 'Facebook', 'url' => 'https://facebook.com', 'image_path' => 'badge.svg'],
            ['name' => 'YouTube', 'url' => 'https://youtube.com', 'image_path' => 'badge.svg'],
            ['name' => 'Instagram', 'url' => 'https://instagram.com', 'image_path' => 'badge.svg'],
            ['name' => 'LinkedIn', 'url' => 'https://linkedin.com', 'image_path' => 'badge.svg'],
            ['name' => 'WhatsApp', 'url' => 'https://whatsApp.com', 'image_path' => 'badge.svg'],
            ['name' => 'x(Twitter)', 'url' => 'https://twitter.com', 'image_path' => 'badge.svg'],
            ['name' => 'TikTok', 'url' => 'https://tiktok.com', 'image_path' => 'badge.svg'],
            ['name' => 'Flickr', 'url' => 'https://snapchat.com', 'image_path' => 'badge.svg'],

        ];

        foreach ($socials as $social) {
            NovaSocials::create($social);
        }
    }
}
