<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Mote Indonesia">

    <title>{{ config('app.name') }}</title>

    <meta name="description" content="We Serve Quality. Not Quantity">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Mote Indonesia">
    <meta itemprop="description" content="We Serve Quality. Not Quantity">
    <meta itemprop="image" content="{{ asset('img/logos/logo.png') }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="www.mote.co.id">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Mote Indonesia">
    <meta property="og:description" content="We Serve Quality. Not Quantity">
    <meta property="og:image" content="{{ asset('img/logos/logo.png') }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Mote Indonesia">
    <meta name="twitter:description" content="We Serve Quality. Not Quantity">
    <meta name="twitter:image" content="{{ asset('img/logos/logo.png') }}">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sb-admin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sb-admin2/css/sb-admin-2.css') }}" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.ico') }}">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">

            <div class="col-xl-6 col-lg-6 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img class="img-fluid mb-5 rounded"
                                            src="{{ asset('img/logos/logo_250x250.png') }}" alt="">
                                    </div>
                                    <form class="user" action="{{ route('store.login') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror" name="username"
                                                placeholder="Enter Username">
                                            @error('username')
                                                <div class="px-3 mt-2 error invalid-feedback d-block w-100">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                            @error('password')
                                                <div class="px-3 mt-2 error invalid-feedback d-block w-100">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sb-admin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb-admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sb-admin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sb-admin2/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
