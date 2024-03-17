<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PoojaCreationsSlots extends Model
{

    use HasFactory;
    
    protected $fillable = [
        "id",
        "pooja_create_id",
        'morning_start_time',
        'morning_end_time',
        'evening_start_time',
        'evening_end_time',
        'is_morning',
        'is_evening',
        'slot_time',
        'start_time',
        'end_time',
        "created_at",
        "updated_at",
    ];

    public function poojaCreations()
    {
        return $this->belongsTo('App\Models\PoojaCreations','id');
    }
}
