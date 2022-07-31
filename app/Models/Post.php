<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TagPost;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title'];

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
}
