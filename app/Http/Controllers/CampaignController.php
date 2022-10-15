<?php

declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Requests\CampaignRequest;
use App\Models\Campaign;
use App\Repository\CampaignRepositoryInterface;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class CampaignController extends Controller
{
    public function __construct(
        private CampaignRepositoryInterface $campaignRepository,
    ) {
    }
    /**
     * @OA\Tag(
     *     name="Campaign",
     *     description="Campaign related operations"
     * )
     * @OA\Info(
     *     version="1.0",
     *     title="Campaign service API",
     *     description="Campaign service info",
     *     @OA\Contact(name="Swagger API Team")
     * )
     * @OA\Server(
     *     url="http://localhost:8001",
     *     description="API server"
     * )
     */
    public function create(CampaignRequest $request): Response|JsonResponse
    {
        try {
            $campaign = new Campaign($request->validated());
            $this->campaignRepository->save($campaign);

            return response()->json([
                "message" => "Campaign saved successfully.",
                "data" => ''
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response($th->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
    
    /**
     * @OA\Get(
     *     path="/api/v1/campaigns",
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */
    public function listCampaigns(): Response|JsonResponse
    {
        if ($campaigns = Cache::get('campaigns')) {
            return response()->json([
                "message" => "list of campaigns",
                "data" => $campaigns
            ], Response::HTTP_OK);
        }

        $campaigns = $this->campaignRepository->listCampaigns();

        Cache::set('campaigns', $campaigns, 15 * 60); //15 min

        return response()->json([
            "message" => "list of campaigns",
            "data" => $campaigns
        ], Response::HTTP_OK);
    }
}
