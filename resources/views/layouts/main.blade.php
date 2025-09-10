<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php if(isset($title)) { echo $title; }else{ ?> {{ config('app.name') }} <?php } ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('main/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="{{ asset('main/lib/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('main/lib/bootstrap-icon/font/bootstrap-icons.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('main/css/maicons.css') }}">

    <link rel="stylesheet" href="{{ asset('main/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('main/vendor/animate/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('main/css/theme.css') }}">
    @stack('style')
    @stack('script')
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

    <header>
      @include('inc.main_navbar')
    </header>
    
    @yield('content')

    @include('inc.main_footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a> 

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('main/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('main/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('main/js/google-maps.js') }}"></script>
    <script src="{{ asset('main/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('main/js/theme.js') }}"></script>
    <script src="{{ asset('main/lib/counterup/counterup.min.js') }}"></script>   
    @stack('script')   
</body>
</html>
