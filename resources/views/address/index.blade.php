@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold"> Address User </h1>
        <h3 class="text-3xl bold mt-10"> {{ $address->country }}</h3>
    </div>

      <div
        class="flex justify-center my-10">
        <a href="/users" class="bg-gray-500 p-2 text-white rounded-lg text-gray-5"> List user </a>
    </div>

    <div class="w-5/6 py-10">
         <div class="m-auto">
            <span class="uppercase text-zinc-400 font-bold text-sm">
                {{  $address->user->email }}
            </span>

            <h2 class="text-gray-700 text-5xl">
                {{  $address->user->name }}
            </h2>



            <hr class="mt-4 mb-8">
        </div>

        {{-- @foreach ( $address->users as $user )
            <div class="m-auto">
                <span class="uppercase text-zinc-400 font-bold text-sm">
                    {{  $user->email }}
                </span>

                <h2 class="text-gray-700 text-5xl">
                    {{  $user->name }}
                </h2>

                <p class="text-lg text-gray-700 py-6">
                    <a
                        href="addresses/{{ $user->address->id }}"
                        class="text-blue-400 hover:text-blue-600 hover:underline">
                        {{ $user->address->country }}
                    </a>
                </p>

                <hr class="mt-4 mb-8">
            </div>
        @endforeach --}}
    </div>
</div>


@endsection
