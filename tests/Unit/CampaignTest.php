<?php

namespace Tests\Unit;

use App\Models\Campaign;
use App\Repository\Eloquent\CampaignRepository;
use Illuminate\Foundation\Testing\RefreshDatabase as TestingRefreshDatabase;
use Tests\TestCase;

class CampaignTest extends TestCase
{
    use TestingRefreshDatabase;
    
    /**
     * test_if_campaigns_are_created
     *
     * @return void
     */
    public function test_if_campaigns_are_created()
    {
        Campaign::factory()->count(5)->create();

        $campaignRepository = new CampaignRepository(new Campaign());

        $campaigns = $campaignRepository->listCampaigns();

        self::assertNotEmpty($campaigns);
        self::assertCount(5, $campaigns);
    }
}
