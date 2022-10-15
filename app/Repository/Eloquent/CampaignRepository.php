<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\Campaign;
use App\Repository\CampaignRepositoryInterface;
use Iterator;

final class CampaignRepository implements CampaignRepositoryInterface
{
    use CommonQueriesTrait;

    public function __construct(private Campaign $Campaign)
    {
    }

    public function listForSelect(): Iterator
    {
        return $this->queryForSelect($this->country, 'countryId', 'name');
    }

    public function save(Campaign $campaign): void
    {
        $campaign->save();
    }

}
