<?php

namespace Database\Seeders;

use App\Models\Footer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $footers = [
            'footer1' => 'Quick Links',
            'footer2' => 'All Rights Reserved',
            'footer_content'=>'footer pages'

        ];

            $footerData = $footers;

            $footerData['footer_content'] = "Sample content for the main page";

            Footer::create($footerData);
    }
}
