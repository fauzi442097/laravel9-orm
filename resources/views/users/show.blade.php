@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold"> User </h1>
    </div>

    <div
        class="flex justify-center my-10">
        <a href="/users" class="bg-gray-500 p-2 text-white rounded-lg text-gray-5 mr-3"> List Users </a>
        <a href="/posts" class="bg-gray-500 p-2 text-white rounded-lg text-gray-5"> List Posts </a>
    </div>

    <div class="w-5/6 py-10">
        <div class="m-auto">

            <span class="uppercase text-zinc-400 font-bold text-sm">
                {{  $user->email }}
            </span>

            <h2 class="text-gray-700 text-5xl">
                {{  $user->name }}
            </h2>

            <p class="text-lg text-gray-700 py-6">
                @if ( $user->addressess )
                    @foreach ( $user->addressess as $address )
                        <a
                            href="addresses/{{ $address->id }}"
                            class="text-blue-400 block hover:text-blue-600 hover:underline">
                            {{ $address->country }}
                        </a>
                    @endforeach
                @endif
            </p>

            <hr class="mt-4 mb-8">

             <div>
                <p class="text-gray-400 bold"> POSTS : </p>
                @if ($user->posts)
                    @foreach ($user->posts as $post)
                        <div class="m-auto mt-5">
                            <span class="uppercase text-zinc-400 font-bold text-sm">
                                {{  $post->created_at }}
                            </span>

                            <h2 class="text-gray-700 text-3xl">
                                {{  $post->title }}
                            </h2>

                            <p class="text-gray-700 py-6">
                                {{  $post->description }}
                            </p>

                            {{-- <p class="text-gray-500 text-sm">
                                Author by
                                <a
                                    href="/users/{{ $post->id }}"
                                    class="italic text-blue-500 hover:underline cursor-pointer"> {{ $post->user->name }} </a>
                            </p> --}}

                            <hr class="mt-4 mb-8">
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </div>
</div>


@endsection
