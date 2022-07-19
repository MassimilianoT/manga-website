{{-- @extends('layouts.master')

@section('content')
    @guest
        <a href="/register"> Registrati qui </a>
    @endguest

    @auth
        <h1> {{ auth()->user()->name }}</h1>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-primary"> Logout </button>
        </form>
    @endauth
@stop --}}

@extends('layouts.master')

@section('content')
    <div class="container-fluid"> @auth
            <h1 class="p-2 text-center  ">Benvenuto {{ auth()->user()->name }}</h1>
        @endauth
        @guest
            <h1 class="p-2 text-center">Benvenuto visitatore</h1>
        @endguest
        @if ($mangas->count() > 0)
        <div class="row gx-2 mx-2 justify-content-center">
            @foreach ($mangas as $manga)
                <x-manga_card :manga="$manga" />
            @endforeach
        </div>
        @else
            <p class="p-2 text-center">Nessun manga ancora caricato</p>
            @endif
    </div>
@endsection
