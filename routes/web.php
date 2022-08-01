<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\userController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Models\Address;
use App\Models\CommentPolymorphic;
use App\Models\User;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('comments', function () {

    $post = Post::find(23);
    dd($post->comments);
    // dd($post->comments);
    // $user = User::factory()->create();

    // $post = Post::create([
    //     'user_id' => $user->id,
    //     'title' => 'example post title',
    //     'description' => 'desc for post'
    // ]);

    // $post->comments()->create([
    //     'user_id' => $user->id,
    //     'body' => 'Comment for post'
    // ]);

    // $video = Video::create([
    //     'title' => 'exmaple video title'
    // ]);

    // $video->comments()->create([
    //     'user_id' => 23,
    //     'body' => 'comment for video'
    // ]);

    $comment = CommentPolymorphic::find(3);
    dd($comment->commentable);

    // $post = Post::find(23);

    // $post->comments()->create([
    //     'user_id' => 78,
    //     'body' => 'For user id 78'
    // ]);

    // dd($post->comments);

    dd('Sukses');
});

Route::view('/start', 'start');
Route::resource('/cars', CarController::class);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::get('/users/{user}', [UserController::class, 'show']);

Route::get('/addresses/{id}', [AddressController::class, 'show']);


Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/users/{id}', [PostController::class, 'showPostUser']);

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/create', [ProjectController::class, 'create']);

Route::get('/tasks', [TaskController::class, 'index']);

Route::get('/comments/create', [CommentController::class, 'create']);
Route::get('/comments/index', [CommentController::class, 'index']);

Route::get('/tags', function () {
    $tags = Tag::with('posts')->get();
    return view('tags.index', ['tags' => $tags]);
});
