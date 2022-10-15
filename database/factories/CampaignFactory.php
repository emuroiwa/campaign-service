<?php

namespace Database\Factories;

use App\Models\CampaignCategory;
use App\Models\CampaignCurrency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $campaignCurrency = CampaignCurrency::factory()->create();
        $campaignCategory = CampaignCategory::factory()->create();
        return [
            'campaign_catergory_id' => $campaignCategory->id,
            'currency_id' => $campaignCurrency->id,
            'title' => fake()->word(),
            'uri' => fake()->word(), 
            'goal_amount' => fake()->randomNumber(4),
            'description' => fake()->paragraph(2),
        ];
    }
}
