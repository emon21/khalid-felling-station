<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUS extends Model
{
    //

    protected $table = 'contact_u_s';

    protected $fillable = [
        'name',
        'email',
        'message',
        'subject',
    ];
}
