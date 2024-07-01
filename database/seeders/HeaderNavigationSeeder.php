<?php

namespace Database\Seeders;

use App\Models\HeaderNavigation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeaderNavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $headerNavigations = [
            'header1' => 'Product',
            'header2' => 'Features',
            'header3' => 'Marketplace',
            'header4' => 'Company',
            'header5' => 'Alternative Energy',
            'header6' => 'Public',
            'header7' => 'Stock Market',
            'header8' => 'Light / Dark',
            'header9' => 'Increase Text',
            'header10' => 'Increase Text',
            'header12' => 'Open main menu',
            'header19' => 'Your Company',
            'image' => 'logo.png',
            'header_navigation_content'=>'pages'
        ];

        $headerData = $headerNavigations;

        $headerData['header_navigation_content'] = "Sample content for the main page";

        HeaderNavigation::create($headerData);
    }
}
