<?php

namespace Database\Seeders;

use App\Models\CampaignCategory as ModelsCampaignCategory;
use Illuminate\Database\Seeder;

class CampaignCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsCampaignCategory::create([
            'title' => 'Creator',
            'description' => 'Content Creator',
        ]);
        ModelsCampaignCategory::create([
            'title' => 'Charity',
            'description' => 'Charity',
        ]);
    }
}
