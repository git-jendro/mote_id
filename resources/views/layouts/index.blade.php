<!doctype html>
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

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.ico') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    @yield('content')

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    @yield('js')
</body>

</html>
