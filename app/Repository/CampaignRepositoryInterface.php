<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Campaign;
use Illuminate\Support\Collection;

interface CampaignRepositoryInterface
{
    public function listCampaigns(): Collection;

    public function save(Campaign $campaign): void;
}
