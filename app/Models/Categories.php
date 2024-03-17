<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categories extends Model
{

    use HasFactory;
    
    protected $table = 'categories';

    protected $fillable = [
        'id',
        'title',
        'slug',
        'created_at',
        'updated_at',
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
            $slug      = \Str::slug($obj->title);
            $count     = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->where('id','!=',$obj->id)->count();
            $obj->slug = $count ? "{$slug}-{$count}" : $slug;
        });

        static::deleted(function($obj) {
            
        });
    }

    /**
     * Get all of the Blogs for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany(Events::class, 'category_id', 'id');
    }
}
