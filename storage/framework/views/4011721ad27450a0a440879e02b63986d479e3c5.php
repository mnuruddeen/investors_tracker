<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php if(isset($title)) { echo $title; }else{ ?> <?php echo e(config('app.name')); ?> <?php } ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?php echo e(asset('main/img/favicon.ico')); ?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="<?php echo e(asset('main/lib/font-awesome/css/all.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('main/lib/bootstrap-icon/font/bootstrap-icons.css')); ?>" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo e(asset('main/lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('main/lib/animate/animate.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('main/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('main/lib/twentytwenty/twentytwenty.css')); ?>" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo e(asset('main/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo e(asset('main/css/style.css')); ?>" rel="stylesheet">
   
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <?php echo $__env->make('inc.main_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('inc.main_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="<?php echo e(asset('main/lib/jquery-3.4.1/js/jquery-3.4.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('main/lib/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('main/lib/wow/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('main/lib/easing/easing.min.js')); ?>"></script>
    <script src="<?php echo e(asset('main/lib/waypoints/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('main/lib/owlcarousel/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('main/lib/tempusdominus/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('main/lib/tempusdominus/js/moment-timezone.min.js')); ?>"></script>
    <script src="<?php echo e(asset('main/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('main/lib/twentytwenty/jquery.event.move.js')); ?>"></script>
    <script src="<?php echo e(asset('main/lib/twentytwenty/jquery.twentytwenty.js')); ?>"></script>

    <!-- Template Javascript -->
    <script src="<?php echo e(asset('main/js/main.js')); ?>"></script>    
</body>
</html>
<?php /**PATH C:\Users\HP\Desktop\Repository\bs-pcac\resources\views/layouts/main.blade.php ENDPATH**/ ?>