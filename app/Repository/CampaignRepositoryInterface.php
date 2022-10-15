<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Campaign;
use Iterator;

interface CampaignRepositoryInterface
{
    public function listForSelect(): Iterator;

    public function save(Campaign $campaign): void;
}
