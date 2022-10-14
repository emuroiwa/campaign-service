<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $fillable = [
        'campaign_catergory_id', 'currency_id', 'title', 'uri', 'goal_amount', 'payout_type', 'description', 'user_id', 'cover_image', 'short_description'
    ];
}
