@extends('layouts.master')

@section('content')
    <style>
        body {
            background-color: #f5f7fa;
        }

        .pink.darken-4 {
            background-color: #4A148C;
        }

        .md-calendar .form-check,
        .card-form .form-check {
            margin-left: .32rem;
        }

        .red-checkbox .form-check-input:checked {
            border-color: #fb0025;
        }

        .red-checkbox .form-check-input:checked:focus:before {
            box-shadow: 0 0 0 13px #fb0025;
        }

        .card-form .card-form-2 {
            -webkit-border-top-left-radius: 21px;
            border-top-left-radius: 21px;
            -webkit-border-top-right-radius: 21px;
            border-top-right-radius: 21px;
            margin-top: -35px;
        }

        .card-form .card-form-2 .pink-accent-text {
            color: #c51162;
        }
    </style>
    <div class="container">
        <section class="mx-auto my-5"  style="max-width: 30rem;"  >
            <form class="g-0" action='/login' method='post'>
            @csrf
            
            <div class="card card-form rounded-6 mt-2 mb-4">
                <div class="card-body rounded-6 pink darken-4">
                    <h3 class="font-weight-bold text-center text-uppercase text-white my-4 mb-5">Log in</h3>
                    <div class="pb-5 px-2">
                        <div class="d-flex justify-content-start align-items-center mb-5">
                            <i class="far fa-envelope fa-lg text-white fa-fw me-3"></i>
                            <div class="form-outline form-white w-100">
                                <input type="email" id="email" class="form-control" name="email" required/>
                                <label class="form-label" for="email">E-mail</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start align-items-center pb-5">
                            <i class="far fa-star fa-lg text-white fa-fw me-3"></i>
                            <div class="form-outline form-white w-100">
                                <input type="password" id="password" name= "password" class="form-control" required/>
                                <label class="form-label" for="password">Password</label>
                                <!--<div class="form-helper text-white">At least 8 characters and 1 digit</div>-->
                            </div> 
                        </div>
                        @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                    </div>
                  </div>
                    <div class="card card-form-2 mb-0 z-depth-0">
                        <div class="card-body">
                            <div class="text-center">
                                <button class="btn btn-outline-danger btn-rounded w-100 my-4"
                                    type="submit">Accedi</button>
                                    <p class="m-0">o</p>
                                    <a class="btn btn-outline-warning btn-rounded w-100 my-4" href="/register" >Registrati</a>
                            </div>
                            
                        </div>

                    </div>
                </div>
          </form>
        </section>
    </div>
    
@endsection
