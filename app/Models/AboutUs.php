<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AboutUs extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'id',
        'aboutus_title',
        'aboutus_description',
        'aboutus_image',
        'programs_title',
        'programs_description1',
        'programs_description2',
        'programs_description3',
        'ourmission_title',
        'ourmission_description',
        'history_title',
        'history_description1',
        'history_description2',
        'history_description3',
        'history_image',
        'whoweare_title',
        'whoweare_description',
        'whatarewe_title',
        'whatarewe_description',
        'objectives_title',
        'objectives_description1',
        'objectives_description2',
        'objectives_description3',
        'created_at',
        'updated_at',
    ];
    // protected $appends = [
    //     "image_full_path"
    // ];
    
    protected static function booted()
    {
        static::updating(function ($obj) {
            if ($obj->image != $obj->getOriginal('image')) {
                removeFile($obj->getOriginal('image'));
            }
        });
    }

    // public function getImageFullPathAttribute()
    // {
    //     return getImageUrl( $this->image );
    // }
}
