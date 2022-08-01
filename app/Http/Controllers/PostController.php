<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::find(23);
        dd($post->latestComment);

        $image = Image::find(1);
        // $image->imageable; // retrive parent data

        // $tag = Tag::create([
        //     'name' => 'Laravel'
        // ]);

        // $post = Post::first();

        // // // Insert pivot table
        // $post->tags()->attach([
        //     1 => [
        //         'status' => 'approved'
        //     ]
        // ]);

        // insert pivot table with additional column
        // Post::first()->tags()->attach([
        //     1 => [
        //         'status' => 'approved'
        //     ]
        // ]);


        /*
          whereHas == Has : filter for post that have a user
          whereDoesntHave == doesntHave : filter for post that doesn't have a user
        */
        $posts = Post::latest('id')
            ->with(['user', 'tags', 'image'])
            // ->has('user.addressess', '>', 1) // return user has more one country
            // ->whereHas('user.addressess', function ($query) {
            //     $query->where('country', 'India');
            // }) // return user has country india
            // ->whereHas('user', function ($query) {
            //     $query->where('name', 'Sydnee Shanahan MD');
            // })
            // ->has('user')
            ->get();

        return view('post.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $newPost = Post::factory()->create();
        $newPost->image()->create([
            'url' => fake()->url()
        ]);
        return redirect('/posts');
    }

    public function showPostUser(Post $post)
    {
    }
}
