@extends('layouts.master')

@section('content')
    <div class="container-fluid"> 
        <h1 class="p-2 text-center  ">Categoria: {{ $category->name }}</h1>
        @if ($category->mangas->count() > 0)
        <div class="row gx-2 mx-2 justify-content-center">
            @foreach ($category->mangas as $manga)
                <x-manga_card :manga="$manga" />
            @endforeach
        </div>
        @else
        <p class="p-2 text-center">Nessun fumetto appartiene a questa categoria</p>
        @endif
    </div>
@endsection
