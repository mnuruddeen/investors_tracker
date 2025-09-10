<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta charset="utf-8">
        <title><?php if(isset($title)) { echo $title; }else{ ?> <?php echo e(config('app.name')); ?> <?php } ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicon -->
        <link href="<?php echo e(asset('main/img/favicon.png')); ?>" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="<?php echo e(asset('main/lib/font-awesome/css/all.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('main/lib/bootstrap-icon/font/bootstrap-icons.css')); ?>" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="<?php echo e(asset('main/lib/animate/animate.min.css')); ?>"/>
        <link href="<?php echo e(asset('main/lib/lightbox/css/lightbox.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('main/lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="<?php echo e(asset('main/css/bootstrap.min.css')); ?>" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="<?php echo e(asset('main/css/style.css')); ?>" rel="stylesheet">
    </head>

    <body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <?php echo $__env->make('inc.main_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('inc.main_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a> 


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('main/lib/wow/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('main/lib/easing/easing.min.js')); ?>"></script>
    <script src="<?php echo e(asset('main/lib/waypoints/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('main/lib/counterup/counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('main/lib/lightbox/js/lightbox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('main/lib/owlcarousel/owl.carousel.min.js')); ?>"></script>
    

    <!-- Template Javascript -->
    <script src="<?php echo e(asset('main/js/main.js')); ?>"></script>   
</body>
</html>
<?php /**PATH C:\Users\Administrator\Desktop\Repository\grv-mis\resources\views/layouts/main.blade.php ENDPATH**/ ?>