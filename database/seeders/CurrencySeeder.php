<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            'currency1' => 'USSD',
            'currency2' => '*997#',
        ];
        $currencyData =  $currencies;

        $currencyData['main_page_content'] = "Sample content for the main page";

        Currency::create($currencyData);
    }
}
