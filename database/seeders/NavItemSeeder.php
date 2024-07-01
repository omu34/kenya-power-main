<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $navItems=[
            'nav1' => 'Nav Item 1',
            'nav2' => 'Nav Item 2',
           'link1' => 'Link 1',
           'link2' => 'link 2',
    ];

    $navItemData =  $navItems;
    foreach ($navItemData as $key => $value) {
        \App\Models\NavItem::create([
            'key' => $key,
            'value' => $value,
        ]);
    }
}
}
