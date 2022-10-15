<?php

namespace Tests\Feature;

use App\Models\Campaign;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\CampaignCategory;
use App\Models\CampaignCurrency;
use Tests\TestCase;

class CampaignTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_campaign_is_created()
    {
        $campaignCurrency = CampaignCurrency::factory()->create();
        $campaignCategory = CampaignCategory::factory()->create();

        $response = $this->postJson('/api/v1/campaign', [
            'campaign_catergory_id' => $campaignCategory->id,
            'currency_id' => $campaignCurrency->id,
            'title' => fake()->word(),
            'uri' => fake()->word(), 
            'goal_amount' => fake()->randomNumber(4),
            'description' => fake()->paragraph(2),
        ]);
 
        $response
            ->assertStatus(201);
    }

    public function test_get_campaign()
    {
        CampaignCurrency::factory()->create();
        CampaignCategory::factory()->create();
        Campaign::factory()->count(5)->create();

        $response = $this->get('/api/v1/campaigns');
        $response->assertStatus(200);
        self::assertNotEmpty($response);
        self::assertCount(5, $response['data']);
    }
}
