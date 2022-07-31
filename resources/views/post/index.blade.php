@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold"> Posts </h1>
    </div>

    <div
        class="flex justify-center my-10">
        <a href="/posts/create" class="bg-gray-500 p-2 text-white rounded-lg text-gray-5"> Generate Post </a>
    </div>

    <div class="w-5/6 py-10">
        @foreach ( $posts as $post )
            <div class="m-auto">
                <span class="uppercase text-zinc-400 font-bold text-sm">
                    {{  $post->created_at }}
                </span>

                <h2 class="text-gray-700 text-5xl">
                    {{  $post->title }}
                </h2>

                <p class="text-gray-700 py-6">
                    {{  $post->description }}
                </p>

                <div class="my-4">
                    @foreach( $post->tags as $tag )
                    <span class="text-gray-400"> #{{ $tag->name }} ({{ $tag->pivot->created_at }})</span>
                    @endforeach
                </div>

                <p class="text-gray-500 text-sm">
                    Author by
                    @if ( $post->user->id )
                    <a
                        href="/users/{{ optional($post->user)->id }}"
                        class="italic text-blue-500 hover:underline cursor-pointer"> {{ optional($post->user)->name }} </a>
                    @else
                        <span class="text-gray-400 text-sm cursor-not-allowed"> {{ $post->user->name }}</span>
                    @endif
                </p>

                <hr class="mt-4 mb-8">
            </div>
        @endforeach
    </div>
</div>


@endsection
