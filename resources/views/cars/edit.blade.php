@extends('layouts.app')

@section('content')
<div class="mt-auto w-4/8 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold">
            Edit Car
        </h1>
    </div>

    <div class="flex justify-center mt-10 mb-0">
        <a
            class="border-b-2 pb-2 border-dotted italic text-gray-500"
            href="/cars"> &larr; Back</a>
    </div>

    <div class="flex justify-center pt-10">
        <form action="/cars/{{ $car->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="block">
                <input
                    type="text"
                    class="block focus:outline-none focus:shadow-lg mb-10 p-2 w-80 italic placeholder-gray-400 rounded-lg"
                    name="name"
                    required
                    value="{{ $car->name }}"
                    placeholder="Brancd name ...">

                 <input
                    type="text"
                    class="block focus:outline-none focus:shadow-lg mb-10 p-2 w-80 italic placeholder-gray-400 rounded-lg"
                    name="founded"
                    required
                    value="{{ $car->founded }}"
                    placeholder="Founded ...">

                <input
                    type="text"
                    class="block focus:outline-none focus:shadow-lg mb-10 p-2 w-80 italic placeholder-gray-400 rounded-lg"
                    name="description"
                    required
                    value="{{ $car->description }}"
                    placeholder="description ...">

                <button
                    class="bg-green-500 block focus:shadow-lg mb-10 p-2 w-80 uppercase rounded-lg font-bold hover:bg-green-700 hover:text-white">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
