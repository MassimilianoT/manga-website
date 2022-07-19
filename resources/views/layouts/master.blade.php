<!doctype html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MangaSite</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <style>
        .navbar-custom {
            background: #4A148C;
        }

        .bg-special {
            background: #EDE7F6;
        }

        body {
            font-family: 'Raleway', sans-serif;
        }

        .form-control:focus {
            border-color: #4A148C;
            box-shadow: 0 0 0 0.2rem #f5f7fa;
            ;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100 bg-special">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand p-0" href="/"><img id="MDB-logo" src="/images/logo.png" alt="MDB Logo"
                    draggable="false" width="80" /></a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-white" href="/"><i
                                class="fas fa-plus-circle pe-2"></i>Fumetti</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link mx-2 text-white" href="#!"><i class="fas fa-bell pe-2"></i>Alerts</a>
                    </li> --}}
                    @auth
                        <li class="nav-item">
                            <a class="nav-link mx-2 text-white" href="/favourites"><i
                                    class="fas fa-heart pe-2"></i>Favourites</a>
                        </li>
                        <a class="nav-link mx-2 text-white" href="/admin"><i
                            class="fas fa fa-pencil pe-2"></i>Admin</a>
                        <li class="nav-item mx-2 d-flex">
                            <img class="rounded-circle me-2" src="{{auth()->user()->avatar}}" alt="avatar" width="30"
                                height="30" />
                            <p class="text-white my-auto" href="#!">Benvenuto {{ auth()->user()->name }}</p>
                        </li>
                    @endauth

                    {{-- <li class="nav-item ms-3">
                        <a class="btn btn-black btn-rounded" href="/register">Sign in</a>
                    </li> --}}
                    @guest
                        <li class="nav-item ms-3">
                            <a class="btn btn-white btn-rounded" href="/login">Accedi</a>
                        </li>
                    @endguest

                    @auth
                        <form action="/logout" method="post">
                            @csrf
                            <li class="nav-item ms-3">
                                <button class="btn btn-black btn-rounded" type="submit">Logout</button>
                            </li>
                        </form>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
        </div>
    @elseif (session()->has('failure'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session()->get('failure') }}
        <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
    </div>
    @endif
    @yield('content')

    <footer class="footer mt-auto">
        <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-dark">Tummolo Massimiliano</a>
        </div>
    </footer>
</body>
