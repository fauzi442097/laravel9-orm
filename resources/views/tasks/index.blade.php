@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold"> Tasks </h1>
    </div>

    <div class="w-5/6 py-10">
        @foreach ( $tasks as $task )
            <div class="m-auto">

               <ul class="list-disc">
                    <li> {{ $task->title }} <span class="font-bold"> on project </span> <span class="italic"> {{ $task->projects->title }} </span> </li>
               </ul>

                <hr class="mt-4 mb-8">
            </div>
        @endforeach
    </div>
</div>


@endsection
