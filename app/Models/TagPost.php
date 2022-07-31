<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TagPost extends Pivot
{
    //
    public $table = "tag_post";

    public static function boot()
    {
        parent::boot();

        static::created(function ($tagPost) {
            dd('tag post created');
        });
    }
}
