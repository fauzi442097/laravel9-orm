<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function comments()
    {
        return $this->morphMany(CommentPolymorphic::class, 'commentable');
    }

    public function comment()
    {
        return $this->morphOne(CommentPolymorphic::class, 'commentable')
            ->latest();
    }
}
