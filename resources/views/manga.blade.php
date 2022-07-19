@extends('layouts.master')

@section('content')
    <!-- start reading intro -->
    <div class="container w-75 mx-auto my-5">
        <div class="read-intro p-4 bg-light border rounded">

            <div class="row">
                <div class="img-fluid col-3">
                    <img class="img-fluid" src="{{$manga->avatar}}"
                        alt="">
                </div>
                <div class="info col-9">
                    <div class="d-flex justify-content-between mb-4">
                        <h2 class="p-2 head">{{ $manga->name }}</h2>
                        @auth
                        <button id="btn-favourite" class="btn" style="background-color:transparent;box-shadow:none">
                            @if ($favourite)
                                <img id="favourite" class="p-2 mr-auto" src="/images/heart-solid.svg" height="50" />
                                <img id="not_favourite" class="p-2 mr-auto" src="/images/heart-regular.svg" height="50"
                                    style="display:none" />
                            @else
                                <img id="favourite" class="p-2 mr-auto" src="/images/heart-solid.svg" height="50"
                                    style="display:none" />
                                <img id="not_favourite" class="p-2 mr-auto" src="/images/heart-regular.svg"
                                    height="50" />
                            @endif
                        </button>
                        @endauth

                    </div>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row">Generi:</th>
                                <td>
                                    @if ($manga->categories->count() == 0)
                                        <i>Al momento non sono registrate categorie.</i>
                                    @endif
                                    @foreach ($manga->categories as $category)
                                        @if ($loop->last)
                                            <a href="/category/{{ $category->slug }}" style="color:#4A148C;">
                                                <ins>{{ $category->name }}</ins></a>
                                        @else
                                            <a href="/category/{{ $category->slug }}" style="color:#4A148C;">
                                                <ins>{{ $category->name }}</ins></a>,
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Autore:</th>
                                <td>{{ $manga->author }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Ultimo capitolo:</th>
                                <td>CH. {{ count($manga->chapters) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Recensione:</th>
                                <td>{{ $manga->rating }} / 5 </td>
                                {{-- <td><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i
                                    class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i
                                    class="fa-thin fa-star fa-2x"></i> <span
                                    class="font-weight-bold ml-3">(10/9)</span></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="mt-4  " style="text-align:justify">
                    {{ $manga->description }}
                </p>
            </div>
            @if (count($manga->chapters))
                <div class="row">
                    <a class="btn text-white my-3 mx-1 px-5" style="background-color:#4A148C ;"
                        href="/manga/{{ $manga->slug }}/chapter/{{ $manga->chapters->first()->slug }}">Inizia a leggere
                        il primo capitolo</a>
                </div>
            @endif
            <div class="intro-lists">
                <h3 class="m-2 mb-4">Capitoli</h3>
                <div class="tab-content">

                    @if (count($manga->chapters))
                        <!-- start ch -->
                        <div id="ch" class="tab-panel">
                            <div class="row">
                                <table class="table table-striped">
                                    <tbody>
                                        @foreach ($manga->chapters as $chapter)
                                            <tr class="row">
                                                <th class="col text-uppercase"><a class="offset-1"
                                                        href="/manga/{{ $manga->slug }}/chapter/{{ $chapter->slug }}">
                                                        CH. {{ $loop->index + 1 }} - {{ $chapter->name }}</a></th>
                                                <td class="col pe-5 text-end text-muted text-uppercase">
                                                    {{ $chapter->created_at->diffForHumans() }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end ch -->
                    @endif
                </div>
            </div>

            <h3 class="m-2 mb-4">Recensioni</h3>
            @auth
                @if ($user_can_comment)
                    @foreach ($manga->comments as $comment)
                        <x-show_comment_card :comment="$comment" />
                    @endforeach
                @else
                    <x-manga_review_card :manga="$manga" />
                @endif
            @endauth

            @guest
                <h4 class="text-center p-2 rounded" style="background-color: rgba(0, 0, 0, 0.1);"> <a
                        href="/login">Accedere</a> per vedere le recensioni</h4>
            @endguest
        </div>
    </div>
    <!-- end reading intro -->

    <script>
        $("#btn-favourite").on("click", function() {
            $.ajax({    
                type: 'POST',
                url: "{{ url('favourites/add') }}",
                data: {
                    manga: "{{ $manga->id }}",
                    _token: '{{csrf_token()}}',
                },
                success: function(data) {
                    if (data.favourite == "true") {
                        $("#favourite").show();
                        $("#not_favourite").hide();
                    } else {
                        $("#not_favourite").show();
                        $("#favourite").hide();
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
        });
    </script>
@endsection
