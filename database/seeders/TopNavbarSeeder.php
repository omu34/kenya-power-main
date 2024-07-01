<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopNavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topNavs=[
            'name' =>'name',
            'link'=>'link'
          ];
          $topNavData =  $topNavs;
          \App\Models\TopNavbar::insert($topNavData);
    }
}
