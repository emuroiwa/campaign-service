<?php

declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Requests\CampaignRequest;
use App\Repository\CampaignRepositoryInterface;
use Illuminate\Http\Response;

class CampaignController extends Controller
{
    public function __construct(
        private CampaignRepositoryInterface $campaignRepository,
    ) {
    }

    public function create(CampaignRequest $request): Response
    {
        try {
            $result = $this->campaign->save($request->string, $request->length);
            return response($result, Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response($th->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
}
