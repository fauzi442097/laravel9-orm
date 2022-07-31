<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use factory;

class UserController extends Controller
{
    //

    public function index()
    {
        $users = User::latest('id')->with('addressess')->get();
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        // Create single user
        $user = User::factory()->create();

        // First Way
        // $user->address()->create([
        //     'country' => fake()->country()
        // ]);

        // Second Way
        // $address = new Address([
        //     'country' => fake()->country()
        // ]);
        // $address->user()->associate($user);
        // $address->save();

        // Third Way with multiple data
        // $address = Address::factory(3)->make();
        // $address->each(function ($value) use ($user) {
        //     $value->user()->associate($user)->save();
        // });

        Address::factory(rand(1, 4))->make()->each(function ($address) use ($user) {
            $address->user()->associate($user)->save();
        });

        return redirect('/users');
    }

    public function show(User $user)
    {
        //Eager Lazy Loading
        // $data = Post::where('user_id', $user->id)->get();
        $data = Post::whereBelongsTo($user)->get();
        dd($data);
        $user->load(['posts', 'addressess']);
        return view('users.show', [
            'user' => $user
        ]);
    }
}
