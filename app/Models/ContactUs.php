<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "phone",
        "email",
        "address",
        "contact_us_title",
        "contact_us_description",
        "social_link1",
        "social_link2",
        "social_link3",
        "social_link4",
        "location",
        "created_at",
        "updated_at"
    ];
}
