<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PoojaCreations extends Model
{

    use HasFactory;
    
    protected $fillable = [
        "id",
        "pooja_id",
        "pooja_name",
        "pooja_desc",
        "samagri_list",
        'date',
        'morning_start_time',
        'morning_end_time',
        'evening_start_time',
        'evening_end_time',
        'morning_blocked',
        'evening_blocked',
        "created_at",
        "updated_at",
    ];

    public function poojaMasters()
    {
        return $this->belongsTo('App\Models\PoojaMasters','id');
    }

    public function poojaCreationsSlots()
    {
        return $this->hasMany('App\Models\PoojaCreationsSlots','pooja_create_id');
    }
}
