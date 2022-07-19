@extends('layouts.master')

@section('content')
    <style>
        .form-select:hover {
            background-color: #EDE7F6
        }

        .form-control:hover {
            background-color: #EDE7F6
        }

        .form-select:hover {
            background-color: #EDE7F6
        }

        .btn-primary {
            background-color: #4A148C
        }
    </style>
    <div class="container">
        <section class="mx-auto my-5" style="max-width: 30rem;">
            <div class="card card-form rounded-6 mt-2 mb-4" style="min-height:450px">
                <div class="card-body rounded-6 pink darken-4">
                    <h3 class="font-weight-bold text-center text-uppercase my-4 mb-5">Aggiungi</h3>
                    <form id="form-selector">
                        <select class="mb-4 form-select" aria-label="Default select example" id="myselect">
                            <option selected>Cosa si desidera aggiungere al database?</option>
                            <option value="chapter_form">Capitolo</option>
                            <option value="manga_form">Manga</option>
                            <option value="cat_form">Categoria</option>
                        </select>
                    </form>
                    <div class="pb-5 px-2">
                        <form name="chapter_form" id="chapter_form" action="/admin?type=chapter" method="post"
                            style="display:none" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" type="text" id="name" name="name"
                                placeholder="Inserire il titolo del nuovo capitolo" required />
                            <select class="mt-2 form-select" aria-label="Default select example" id="manga_id"
                                name="manga_id">
                                <option selected>Scegliere il manga associato al capitolo</option>
                                @foreach ($mangas as $manga)
                                    <option value="{{ $manga->id }}">{{ $manga->name }} - {{ $manga->author }}
                                    </option>
                                @endforeach
                            </select>
                            <input class="mt-2 form-control" type="file" id="chapter_file" name="chapter_file"
                                accept=".zip" placeholder="Caricare il file associato al capitolo" required />
                            <div class="mt-2 d-flex">
                                <button class="mt-2 mx-auto btn btn-primary" type="submit" id="submit_chapter">Aggiungi
                                    capitolo</button>
                            </div>

                        </form>

                        <form name="manga_form" id="manga_form" action="/admin?type=manga" method="post" enctype="multipart/form-data"
                            style="display:none">
                            @csrf
                            <input class="form-control" type="text" id="name" name="name"
                                placeholder="Inserire il titolo del nuovo manga" required />

                            <input class="mt-2 form-control" type="text" id="author" name="author"
                                placeholder="Inserire l'autore del nuovo manga" required />
                            <select class="mt-2 form-select" type="text" aria-label="Default select example"
                                id="categories" name="categories[]" multiple="multiple">
                                <option selected>Scegliere le categorie associate al capitolo</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <input class="mt-2 form-control" type="number" id="publication_year" name="publication_year"
                                placeholder="Anno di pubblicazione" name="publication_year">
                            <textarea class="mt-2 form-control" type="text" id="description" name="description" rows="4"
                                style="resize: none" placeholder="Descrizione del manga"></textarea>
                            <input class="mt-2 form-control" type="file" id="avatar" name="avatar"
                                accept=".jpg, .png, .webp" placeholder="Caricare l'immagine associata al manga" required />
                            <div class="mt-2 d-flex">
                                <button class="mt-2 mx-auto btn btn-primary" type="submit" id="submit_manga">Aggiungi
                                    manga</button>
                            </div>
                        </form>

                        <form name="cat_form" id="cat_form" action="/admin?type=category" method="post"
                            style="display:none">
                            @csrf
                            <input class="form-control" type="text" id="name" name="name"
                                placeholder="Inserire il nome della nuova categoria" required />
                            <div class="mt-2 d-flex">
                                <button class="mt-2 mx-auto btn btn-primary" type="submit" id="submit_cat">Aggiungi
                                    categoria</button>
                            </div>
                        </form>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <script>
                            $("#myselect").on("change", function() {
                                $("#" + $(this).val()).show().siblings().hide();
                            });
                        </script>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
