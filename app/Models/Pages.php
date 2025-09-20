<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    //
    protected $table = 'pages';

    protected $fillable = [
        'page_title',
        'page_name',
        'slug',
        'page_description'
    ];
}
