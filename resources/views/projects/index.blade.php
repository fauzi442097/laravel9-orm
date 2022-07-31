@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold"> Projects </h1>
    </div>

    <div
        class="flex justify-center my-10">
        <a href="/projects/create" class="bg-gray-500 p-2 text-white rounded-lg text-gray-5"> Create Project </a>
    </div>

    <div class="w-5/6 py-10">
        @foreach ( $projects as $project )
            <div class="m-auto">
                <span class="uppercase text-zinc-400 font-bold text-sm">
                    {{  $project->created_at }}
                </span>

                <h2 class="text-gray-700 text-5xl">
                    {{  $project->title }}
                </h2>

                <div class="mt-8">
                    <p class="text-zinc-400 bold"> Task: </p>
                    <ul class="list-decimal mx-10">
                        @forelse ($project->projectTasks as $item)
                            <li> {{ $item->title }}</li>
                        @empty

                        @endforelse
                    </ul>
                </div>

                <div class="mt-8">
                    <p class="text-zinc-400 bold"> Users: </p>
                    <ul class="list-disc mx-10">
                        @forelse ($project->users as $user)
                            <li> {{ $user->name }}</li>
                            <ul class="list-decimal mx-5">
                                @foreach ($user->tasks as $item)
                                    <li> {{ $item->title }} </li>
                                @endforeach
                            </ul>
                        @empty

                        @endforelse
                    </ul>
                </div>


                {{-- <div class="my-4">
                    @foreach( $post->tags as $tag )
                    <span class="text-gray-400"> #{{ $tag->name }} ({{ $tag->pivot->created_at }})</span>
                    @endforeach
                </div> --}}

                {{-- <p class="text-gray-500 text-sm">
                    Users :
                    @if ( $project->users )
                    <a
                        href="/users/{{ optional($post->user)->id }}"
                        class="italic text-blue-500 hover:underline cursor-pointer"> {{ optional($post->user)->name }} </a>
                    @else
                        <span class="text-gray-400 text-sm cursor-not-allowed"> {{ $post->user->name }}</span>
                    @endif
                </p> --}}

                <hr class="mt-4 mb-8">
            </div>
        @endforeach
    </div>
</div>


@endsection
