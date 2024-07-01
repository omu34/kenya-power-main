<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainNavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $mainNavs=[
        'name' =>'name',
        'link'=>'link'
      ];
      $mainNavData =  $mainNavs;
      \App\Models\MainNavbar::insert($mainNavData);
    }
}
