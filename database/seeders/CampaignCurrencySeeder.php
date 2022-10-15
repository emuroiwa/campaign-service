<?php

namespace Database\Seeders;

use App\Models\CampaignCurrency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampaignCurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CampaignCurrency::create([
            'iso_code' => 'ZAR',
            'description' => 'South African Rand',
        ]);
    }
}
