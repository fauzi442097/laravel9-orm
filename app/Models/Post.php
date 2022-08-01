<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TagPost;
use App\Models\Image;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Unknown User', // if value is null
            'id' => null
        ]);
    }

    public function tags()
    {
        // return $this->belongsToMany(Tag::class, 'tag_post', 'post_id', 'tag_id')
        //     ->withTimestamps() // create timestamps column automatically
        //     ->withPivot('status'); //  add additional table

        // Relations with pivot table model
        return $this->belongsToMany(Tag::class, 'tag_post')
            ->using(TagPost::class)
            ->withTimestamps()
            ->withPivot('status');
    }

    public function comments()
    {
        return $this->morphMany(CommentPolymorphic::class, 'commentable');
    }

    public function latestComment()
    {
        return $this->morphOne(CommentPolymorphic::class, 'commentable')
            ->latestOfMany();
    }

    public function oldestComment()
    {
        return $this->morphOne(CommentPolymorphic::class, 'commentable')
            ->oldestOfMany();
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
