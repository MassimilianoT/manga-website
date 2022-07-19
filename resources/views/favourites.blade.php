@extends('layouts.master')

@section('content')
    <div class="container-fluid"> 
        <h1 class="p-2 text-center  ">Fumetti preferiti</h1>
        @if ($mangas->count() > 0)
        <div class="row gx-2 mx-2 justify-content-center">
            @foreach ($mangas as $manga)
                <x-manga_card :manga="$manga" />
            @endforeach
        </div>
        @else
        <p class="p-2 text-center ">Non ancora registrati manga preferiti</p>
        @endif
    </div>
@endsection
