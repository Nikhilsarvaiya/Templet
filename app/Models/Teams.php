<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Teams extends Model
{

    use HasFactory;

    protected $table = 'teams';
    
    protected $fillable = [
        'id',
        'name',
        'designation',
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

    public function getNextAttribute(){
        return static::where('id', '>', $this->id)->orderBy('id','asc')->first();
    }

    public  function getPreviousAttribute(){
        return static::where('id', '<', $this->id)->orderBy('id','desc')->first();
    }
}
