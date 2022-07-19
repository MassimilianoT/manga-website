@props(['comment'])

<section class="mt-4">
    <div class="container text-dark w-100 bg-light">
      <div class="row d-flex justify-content-center">
        <div class="col-12">
          <div class="border rounded">
            <div class="card-body p-4">
              <div class="d-flex flex-start w-100">
                <img class="rounded-circle me-3"
                    src="{{auth()->user()->avatar}}" alt="avatar" width="65"
                  height="65" />
                <div class="w-100">
                  <h5>{{$comment->title}}</h5>
                  <h5 class="text-muted">{{$comment->user->name}}</h5>
                  <h6>{{$comment->rating}} / 5 stelle</h6>
                  <p> 
                    {{$comment->body}}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>