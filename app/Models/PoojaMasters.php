<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PoojaMasters extends Model
{

    use HasFactory;
    
    protected $fillable = [
        "id",
        "pooja_name",
        "pooja_desc",
        "samagri_list",
        'random_id',
        "created_at",
        "updated_at",
    ];

    public function poojaCreations()
    {
        return $this->hasMany('App\Models\PoojaCreations','pooja_id');
    }
}
