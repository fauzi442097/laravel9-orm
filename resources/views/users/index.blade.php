@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold"> Users </h1>
    </div>

    <div
        class="flex justify-center my-10">
        <a href="/users/create" class="bg-gray-500 p-2 text-white rounded-lg text-gray-5"> Create user with address </a>
    </div>

    <div class="w-5/6 py-10">
        @foreach ( $users as $user )
            <div class="m-auto">
                <div class="float-right">
                    <a
                        href="/users/{{ $user->id }}"
                        class="text-blue-500 italic">
                        See details &rarr;
                    </a>
                </div>
                <span class="uppercase text-zinc-400 font-bold text-sm">
                    {{  $user->email }}
                </span>

                <h2 class="text-gray-700 text-5xl">
                    {{  $user->name }}
                </h2>

                @if ( count($user->addressess) > 1 )
                    <p class="text-lg text-gray-700 py-6">
                        @foreach ( $user->addressess as $address )
                            <a
                                href="addresses/{{ $address->id }}"
                                class="text-blue-400 block hover:text-blue-600 hover:underline">
                                {{ $address->country }}
                            </a>
                        @endforeach
                    </p>
                @endif

                <p class="text-md text-gray-700 py-5">
                    @if ( $user->posts_count == 0 )
                        Post not available ..
                    @else
                        Has {{ $user->posts_count }} posts
                    @endif
                </p>

                <hr class="mt-4 mb-8">
            </div>
        @endforeach
    </div>
</div>


@endsection
