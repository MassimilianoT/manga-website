@props(['manga'])
<form action="/manga/{{ $manga->slug }}" method="POST">
    @csrf   
<section>
    <div class="container text-dark">
      <div class="row d-flex justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-8">
          <div class="card">
            <div class="card-body p-4">
              <div class="d-flex flex-start w-100">
                <img class="rounded-circle shadow-1-strong me-3"
                    src="{{auth()->user()->avatar}}" alt="avatar" width="65"
                  height="65" />
                <div class="w-100">
                  <h5>Aggiungi la tua recensione</h5>
                  <h6 class="mt-4">Titolo della recensione: </h6>
                  <input class="form-control" type="text" id="title" name="title" placeholder="Inserire un titolo" required />
                  
                  <h6 class="mt-4">Seleziona un punteggio per questo manga: </h6>
                  <div class="d-flex justify-content-evenly mb-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rating" id="rating1" value="1" required/>
                        <label class="form-check-label" for="rating1">1</label>
                      </div>
                      
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rating" id="rating2" value="2" />
                        <label class="form-check-label" for="rating2">2</label>
                      </div>
                      
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rating" id="rating3" value="3" />
                        <label class="form-check-label" for="rating3">3 </label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rating" id="rating1" value="4" />
                        <label class="form-check-label" for="rating4">4</label>
                      </div>
                      
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rating" id="rating2" value="5" />
                        <label class="form-check-label" for="rating5">5</label>
                      </div>
                      
                  </div>
                  <h6 class="mt-4">Recensione: </h6>
                  <textarea class="form-control" type="text" id="body" name="body"  rows="10" style="resize: none" placeholder="Esporre la propria opinione sul manga"></textarea>

                  <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-danger">
                      Invia <i class="fas fa-long-arrow-alt-right ms-1"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </form>