<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class HomeSlider extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'id',
        'title',
        'image',
        'url',
        'url2',
        'sequence',
        'created_at',
        'updated_at',
    ];
    protected $appends = [
        "image_full_path"
    ];
    
    protected static function booted()
    {
        static::updating(function ($obj) {
            if ($obj->image != $obj->getOriginal('image')) {
                removeFile($obj->getOriginal('image'));
            }
        });
    }

    public function getImageFullPathAttribute()
    {
        return getImageUrl( $this->image );
    }
}
