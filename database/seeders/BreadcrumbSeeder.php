<?php

namespace Database\Seeders;

use App\Models\Breadcrumb;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BreadcrumbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $breadcrumbs = [
            'breadcrumb1' => 'Home',
            // 'main_page_name27' => 'Main Page',
            'breadcrumb2' => 'Single Page',
            'breadcrumb_content'=>' breadcrumb pages'
        ];

        $breadcrumbData = $breadcrumbs;

        $breadcrumbData['breadcrumb_content'] = "Sample content for the main page";

        Breadcrumb::create($breadcrumbData);
    }
}
