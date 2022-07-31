@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 py-24">
    {{-- <div class="text-center">
        <h1 class="text-5xl uppercase bold"> Tags </h1>
    </div> --}}

    <div
        class="flex justify-center my-10">
        <a href="/posts/create" class="bg-gray-500 p-2 text-white rounded-lg text-gray-5"> Generate Post </a>
    </div>

    <div class="w-5/6 py-10">
        @foreach ( $tags as $tag )
            <div class="m-auto mb-10">

                <h2 class="text-gray-700 text-5xl">
                    {{  $tag->name }}
                </h2>

                <p class="text-gray-400 bold mt-5">
                    POSTS:
                </p>
                @forelse( $tag->posts as $post )
                    <div class="my-4">
                        <a class="text-blue-500" href="/posts"> {{ $post->title }}</a>
                    </div>
                    <hr class="mt-2 mb-2">
                @empty
                    <span class="text-gray-500"> Post not available ...</span>
                    <hr class="mt-2 mb-2">
                @endforelse
            </div>
        @endforeach
    </div>
</div>


@endsection
