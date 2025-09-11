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
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('main/css/responsive.css') }}">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('main/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet">
    <!-- owl stylesheets --> 
    <link rel="stylesheet" href="{{ asset('main/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    
    @stack('style')
    @stack('script')
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

    
      @include('inc.main_navbar')
    
    
    @yield('content')

    @include('inc.main_footer')


    <!-- Javascript files-->
    <script src="{{ asset('main/js/jquery.min.js') }}"></script>
    <script src="{{ asset('main/js/popper.min.js') }}"></script>
    <script src="{{ asset('main/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('main/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('main/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('main/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('main/js/custom.js') }}"></script>
    <!-- javascript --> 
    <script src="{{ asset('main/js/owl.carousel.js') }}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>   
    @stack('script')   
</body>
</html>
