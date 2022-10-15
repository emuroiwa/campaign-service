<?php

use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'middleware' => 'throttle:3'], static function () {
    Route::group(['middleware' => 'throttle:3'], static function () {
        Route::post('campaign', [CampaignController::class, 'create'])->name('campaign.create');
    });
    Route::get('campaigns', [CampaignController::class, 'listCampaigns'])->name('campaign.list');
});
