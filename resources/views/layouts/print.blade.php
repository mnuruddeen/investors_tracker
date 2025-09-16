<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="">
    <meta name="author" content="pixelstrap">
    <meta name="robots" content="noindex, nofollow, noimageindex, nosnippet">
    <meta name="googlebot" content="noindex">
    <meta name="googlebot-news" content="nosnippet">

    <title><?php if(isset($title)) { echo $title; }else{ ?> {{ config('app.name') }} <?php } ?></title>
    <!-- Favicon -->
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}">
</head>

<body>

    <div class="container-fluid bg-white">
        @include('inc.report_header')
        @yield('content')
    </div>




@stack('script')
<!-- Custom JS -->

<script type="text/javascript">
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    });
</script>
<script>
    $('#example').DataTable();
</script>
</body>
</html>
