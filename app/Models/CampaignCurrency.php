<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignCurrency extends Model
{
    use HasFactory;
    protected $fillable = [
        'iso_code', 'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}