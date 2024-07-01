<?php

namespace Database\Seeders;

use App\Nova\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuickLinks as NovaQuickLinks;

class QuicklinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $quickLinks = [
            // ['footer3' => 'QuickLinks', 'url' => 'https://Quicklinks', 'image' => 'images/badge.svg'],
            ['name' => 'DashBoard', 'url' => 'https://Dashboard', 'image' =>'badge.svg'],
            ['name' => 'Messages', 'url' => 'https://messages', 'image' => 'badge.svg'],
            ['name' => 'Notifications', 'url' => 'https://notifications', 'image' => 'badge.svg'],


        ];

        foreach ($quickLinks as $link) {
            NovaQuickLinks::create($link);
        }

}}
