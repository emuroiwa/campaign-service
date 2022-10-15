<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\Campaign;
use App\Repository\CampaignRepositoryInterface;
use Illuminate\Support\Collection;

final class CampaignRepository implements CampaignRepositoryInterface
{
    use CommonQueriesTrait;

    public function __construct(private Campaign $campaign)
    {
    }

    public function listCampaigns(): Collection
    {
        return $this->campaign::select('title', 'cover_image', 'uri')
            ->get()
            ->random(5);
    }

    public function save(Campaign $campaign): void
    {
        $campaign->save();
    }

}
