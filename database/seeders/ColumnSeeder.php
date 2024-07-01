<?php

namespace Database\Seeders;

use App\Models\Column;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $columns = [
            'column1' => 'Column 1',
            'column2' => 'Column 2',
            'link' => 'Link',

        ];
        $columnData =  $columns;

        $columnData['main_page_content'] = "Sample content for the main page";

        Column::create($columnData);
    }
}
