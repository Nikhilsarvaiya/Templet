<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkAssists extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "user_id",
        "vehicle_name",
        "vehicle_no",
        "mobile_no",
        "created_at",
        "updated_at"
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
