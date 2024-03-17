<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'phone',
        'email',
        'footer_logo',
        'corporate_address',
        'registered_address',
        'google_play_link',
        'app_store_link',
        'facebook_link',
        'linkedin_link',
        'twitter_link',
        'instagram_link',
        'whatsapp_link',
        'telegram_link',
        'quora_link',
        'address_1',
        'content_1',
        'content_2',
        'address_2',
        'footer_link_title_1',
        'footer_link_1',
        'footer_link_title_2',
        'footer_link_2',
        'footer_link_title_3',
        'footer_link_3',
        'footer_link_title_4',
        'footer_link_4',
        'footer_link_title_5',
        'footer_link_5',
        'footer_link_title_6',
        'footer_link_6',
        'footer_link_title_7',
        'footer_link_7',
        'footer_link_title_8',
        'footer_link_8',
        'footer_link_title_9',
        'footer_link_9',
        'footer_link_title_10',
        'footer_link_10',
        'footer_link_title_11',
        'footer_link_11',
        'created_at',
        'updated_at',
        'attention_investors',
    ];

    protected $appends = [
        "image_full_path"
    ];
    
    protected static function booted()
    {
        static::updating(function ($obj) {
            if ($obj->footer_logo != $obj->getOriginal('footer_logo')) {
                removeFile($obj->getOriginal('footer_logo'));
            }
        });
    }

    public function getImageFullPathAttribute()
    {
        return getImageUrl( $this->footer_logo );
    }

}
