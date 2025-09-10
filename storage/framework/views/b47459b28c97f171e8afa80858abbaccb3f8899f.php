<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="keywords" content="">
    <meta name="author" content="pixelstrap">
    <meta name="robots" content="noindex, nofollow, noimageindex, nosnippet">
    <meta name="googlebot" content="noindex">
    <meta name="googlebot-news" content="nosnippet">

    <title><?php if(isset($title)) { echo $title; }else{ ?> <?php echo e(config('app.name')); ?> <?php } ?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/img/favicon.ico')); ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fonts/boxicons.css')); ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/core.css')); ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/theme-default.css')); ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')); ?>" />

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/dataTables.bootstrap4.min.css')); ?>">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
    <!-- Helpers -->
    <script src="<?php echo e(asset('assets/vendor/js/helpers.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/config.js')); ?>"></script>  
</head>

<body>

    <div class="container-fluid bg-white">
        <?php echo $__env->make('inc.report_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
        <?php echo $__env->yieldContent('content'); ?>
    </div>



<!-- build:js assets/vendor/js/core.js -->
<script src="<?php echo e(asset('assets/vendor/libs/jquery/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/popper/popper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>

<script src="<?php echo e(asset('assets/vendor/js/menu.js')); ?>"></script>
<!-- endbuild -->
<!-- Main JS -->
<script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

<!-- Datatable JS -->
<script src="<?php echo e(asset('assets/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dataTables.bootstrap4.min.js')); ?>"></script>

<!-- Select2 JS -->
<script src="<?php echo e(asset('assets/plugins/select2/js/select2.full.min.js')); ?>"></script>

<?php echo $__env->yieldPushContent('script'); ?>
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
<?php /**PATH C:\Users\HP\Desktop\Repository\bs-pcac\resources\views/layouts/print.blade.php ENDPATH**/ ?>