<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CustomerPoojaBookings extends Model
{

    use HasFactory;
    
    protected $fillable = [
        "id",
        "pooja_creation_id",
        "date",
        "slots",
        "customer_name",
        "customer_number",
        "country_code",
        "created_at",
        "updated_at",
    ];
}
