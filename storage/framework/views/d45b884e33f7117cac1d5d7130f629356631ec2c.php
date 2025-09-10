
<!-- Topbar Start -->
<div class="container-fluid bg-light pe-0 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
            <div class="position-relative d-inline-flex align-items-center bg-primary text-white top-shape px-5">
                <div class="me-3 pe-3 border-end py-2">
                    <p class="m-0"><i class="fa fa-envelope-open me-2"></i><?php echo e(config('app.email')); ?></p>
                </div>
                <div class="py-2">
                    <p class="m-0"><i class="fa fa-phone-alt me-2"></i><?php echo e(config('app.phone')); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a class="btn btn-sm btn-primary btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                <a class="btn btn-sm btn-primary btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                <a class="btn btn-sm btn-primary btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                <a class="btn btn-sm btn-primary btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                <a class="btn btn-sm btn-primary btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
    <a href="<?php echo e(url('/')); ?>" class="navbar-brand p-0">
        <img src="<?php echo e(asset('main/img/logo.png')); ?>">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="<?php echo e(url('/')); ?>" class="nav-item nav-link active">Home</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About</a>
                <div class="dropdown-menu m-0">
                    <a href="<?php echo e(url('/about-us')); ?>" class="dropdown-item">About Us</a>
                    <a href="<?php echo e(url('/mission-vision')); ?>" class="dropdown-item">Mission & Vision</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Departments</a>
                <div class="dropdown-menu m-0">
                    <a href="<?php echo e(url('anti-corruption')); ?>" class="dropdown-item">Anti-Corruption</a>
                    <a href="<?php echo e(url('economic-governance')); ?>" class="dropdown-item">Economic Governance</a>
                    <a href="<?php echo e(url('asset-monitoring')); ?>" class="dropdown-item">Asset Monitoring</a>
                    <a href="<?php echo e(url('citizen-right')); ?>" class="dropdown-item">Citizen Right</a>
                    <a href="<?php echo e(url('public-complaint')); ?>" class="dropdown-item">Public Complaint</a>
                    <a href="<?php echo e(url('cyber-security')); ?>" class="dropdown-item">Cyber Security</a>
                </div>
            </div>
            <a href="<?php echo e(url('/managements')); ?>" class="nav-item nav-link">Management</a>
            <a href="<?php echo e(url('contact-us')); ?>" class="nav-item nav-link">Contact Us</a>
        </div>
        <a href="<?php echo e(url('#')); ?>" class="btn btn-primary py-2 px-4 ms-3">Recruitment</a>
    </div>
</nav>
<!-- Navbar End --><?php /**PATH C:\Users\HP\Desktop\Repository\bs-pcac\resources\views/inc/main_navbar.blade.php ENDPATH**/ ?>