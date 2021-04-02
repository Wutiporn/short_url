<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    //
    protected $table = 'short_urls';
    public $timestamps = true;
    protected $fillable = [
        'long_url', 'short_url',
    ];
}
