@extends('layouts.app')

@section('content')
<div class="mt-auto w-4/8 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold">
            Create Car
        </h1>
    </div>

    <div class="flex justify-center mt-10 mb-0">
        <a
            class="border-b-2 pb-2 border-dotted italic text-gray-500"
            href="/cars"> &larr; Back</a>
    </div>

    <div class="flex justify-center pt-10">
        <form action="/cars" method="POST">
            @csrf
            <div class="block">
                <input
                    type="text"
                    class="block focus:outline-none focus:shadow-lg mb-10 p-2 w-80 italic placeholder-gray-400 rounded-lg"
                    name="name"
                    required
                    placeholder="Brancd name ...">

                 <input
                    type="text"
                    class="block focus:outline-none focus:shadow-lg mb-10 p-2 w-80 italic placeholder-gray-400 rounded-lg"
                    name="founded"
                    required
                    placeholder="Founded ...">

                <input
                    type="text"
                    class="block focus:outline-none focus:shadow-lg mb-10 p-2 w-80 italic placeholder-gray-400 rounded-lg"
                    name="description"
                    required
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
