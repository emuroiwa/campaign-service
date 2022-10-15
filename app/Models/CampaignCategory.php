<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
