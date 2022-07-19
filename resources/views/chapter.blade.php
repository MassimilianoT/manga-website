@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <h3 class="mt-2 text-center">{{ $chapter->name }}</h3>
        <h5 class="text-center"><a href="/manga/{{$chapter->manga->slug}}" style="color: #4A148C"> <ins>Torna alla lista capitoli</ins></a></h5>
        <a class="d-flex">
            <img id="my_image" src="{{ $path }}01.jpg" class="border border-dark rounded-2 bg-light p-4 img-fluid mx-auto" width="1000px">
        </a>
        
        <p class="mt-2 mx-auto text-center" id="page"></p>
    </div>
        <script>
            //Ora ho una lista di immagini su cui iterare
            var counter = 1;
            $("#page").text("Page: " + counter);
            var sorgente = "{{$path}}";
            var n_pages = parseInt("{{$n_pages}}");

            $('#my_image').bind('click', function(event) {
                var x = event.pageX - this.offsetLeft;
                if (x < this.width / 2) {
                    if (counter != 1)
                        counter--;
                } else {
                    if(counter != n_pages)
                        counter++;
                }

                if (counter < 10) {
                    current_val = sorgente + "0" + counter + ".jpg";
                } else {
                    current_val = sorgente + counter + ".jpg";
                }
                
                if(counter == n_pages){
                    $("#page").text("Capitolo terminato");
                }else{
                    $("#page").text("Page: " + counter);
                }
                
                $('#my_image').attr('src', current_val).load(function() {
                    this.width;
                });

            });
        </script>
    @endsection
