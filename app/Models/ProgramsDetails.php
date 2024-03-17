<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramsDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "morning_title",
        "morning_start_time",
        "morning_end_time",
        "evening_title",
        "evening_start_time",
        "evening_end_time",
        "created_at",
        "updated_at"
    ];
}
