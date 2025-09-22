<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    //

    protected $fillable = [
     
        // Company Information
        'site_name',
        'site_logo',
        'site_favicon',
        'site_phone',
        'site_email',
        'site_address',

        // SEO / Meta Info
        'meta_title',
        'meta_description',
        'meta_keywords',

        // Social Media Links
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'linkedin_url',

        // Footer Info
        'copy_right',
    ];

    
}
