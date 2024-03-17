<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Galleries extends Model
{

    use HasFactory;

    protected $table = 'galleries';
    
    protected $fillable = [
        'id',
        'title',
        'image',
        'created_at',
        'updated_at',
    ];
    protected $appends = [
        "image_full_path"
    ];
    
    protected static function booted()
    {
        parent::boot();

        static::updating(function ($obj) {
            if ($obj->image != $obj->getOriginal('image')) {
                removeFile($obj->getOriginal('image'));
            }
        });

        static::deleted(function($obj) {
            if ($obj->image) {
                removeFile($obj->image);
            }
        });
    }

    public function getImageFullPathAttribute()
    {
        return getImageUrl( $this->image );
    }
}
