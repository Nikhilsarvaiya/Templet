<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Events extends Model
{

    use HasFactory;

    protected $table = 'events';
    
    protected $fillable = [
        'id',
        'title',
        'slug',
        'days',
        'address',
        'description',
        'event_image',
        'list_image',
        'start_datetime',
        'end_datetime',
        'duration',
        'cost',
        'category_id',
        'website_url',
        'name',
        'phone',
        'email',
        'organizer_website_url',
        'venue',
        'google_map_url',
        'created_at',
        'updated_at',
    ];
    protected $appends = [
        "image_full_path"
    ];
    
    protected static function booted()
    {
        parent::boot();

        static::creating(function($obj) {
            $slug      = \Str::slug($obj->title);
            $count     = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $obj->slug = $count ? "{$slug}-{$count}" : $slug;
        });

        static::updating(function ($obj) {
            if ($obj->image != $obj->getOriginal('image')) {
                removeFile($obj->getOriginal('image'));
            }
            $slug      = \Str::slug($obj->title);
            $count     = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->where('id','!=',$obj->id)->count();
            $obj->slug = $count ? "{$slug}-{$count}" : $slug;
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

    public function category()
    {
        return $this->belongsTo(Categories::class,'category_id','id');
    }

    public function getNextAttribute(){
        return static::where('id', '>', $this->id)->orderBy('id','asc')->first();
    }

    public  function getPreviousAttribute(){
        return static::where('id', '<', $this->id)->orderBy('id','desc')->first();
    }
}
