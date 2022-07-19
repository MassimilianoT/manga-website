@props(['manga'])
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
    <div class="col-md-4 col-6 btn btn-light mx-2 card mb-3 text-center">
        <div class="row g-0">
          <div class="col-md-3">
            <img
              src="{{$manga->avatar}}"
              alt="{{ $manga->name }}"
              class="img-fluid rounded"
            />
          </div>
          <div class="col-md-9">
            <div class="card-body">
              <a href="/manga/{{$manga->slug}}" class="card-title">{{$manga->name}}</a>
              <p class="card-text">
                @foreach($manga->categories as $category)
                  <a href="/category/{{$category->slug}}" style="color:red;"> {{ $category->name }}</a> <br>               
                @endforeach
                <!--- Aggiungere componente per visualizzare la singola categoria -->
            </p>  
            </div>
            <p class="card-text">
                <small class="p-2 text-muted">Last updated 3 mins ago</small>
              </p> 
          </div>
        </div>
      </div>
