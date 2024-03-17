<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Faq extends Model
{

    use HasFactory;
    
    protected $fillable = [
        "id",
        "title",
        "description",
        "file",
        "created_at",
        "updated_at",
    ];
    // protected $appends = [
    //     "file_path"
    // ];
    
    protected static function booted()
    {
        static::updating(function ($obj) {
            if ($obj->file != $obj->getOriginal('file')) {
                removeFile($obj->getOriginal('file'));
            }
        });
    }

    // public function getImageFullPathAttribute()
    // {
    //     return getImageUrl( $this->file );
    // }
}
