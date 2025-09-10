<?php $__env->startSection('content'); ?>

  <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">About Us</h5>
                        <h1 class="display-6 mb-0"><?php echo e(config('app.name')); ?></h1>
                    </div>

                    <p class="mb-4 text-justify">A Certificate of Occupancy (C of O) Database is a system designed to manage and store information related to certificates of occupancy issued by government authorities. Such databases are essential for tracking land ownership, property rights, and compliance with zoning regulations.
                    </p>
                </div>

                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="<?php echo e(asset('main/img/badge.png')); ?>" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Main Objectives Start -->
    <div class="container-fluid bg-primary bg-appointment my-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-12 py-5">
                    <div class="py-2">
                        <h1 class="display-5 text-white mb-4 text-center"> Benefits of Implementing a C of O Database</h1>

                        <h5 class="mb-2 text-white">The Benefit includes the following;-</h5>
                        <p class="mb-2 text-light"><i class="fa fa-check-circle text-primary me-3"></i> Efficient Record Management: Centralized storage of property and certificate information ensures data is organized and easily accessible.</p>

                        <p class="mb-2 text-light"><i class="fa fa-check-circle text-primary me-3"></i> Enhanced Transparency: Promotes accountability by making information available to authorized users.</p>

                        <p class="mb-2 text-light"><i class="fa fa-check-circle text-primary me-3"></i> Fraud Prevention: Reduces risk of duplicate or fake certificates through unique identification and verification.</p>

                        <p class="mb-2 text-light"><i class="fa fa-check-circle text-primary me-3"></i> Improved Service Delivery: Streamlined processes for certificate issuance, renewal, and verification.</p>

                        <p class="mb-2 text-light"><i class="fa fa-check-circle text-primary me-3"></i> Better Planning: Facilitates urban planning and development by providing accurate property data.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Objectives End -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mukht\Desktop\New Projects\CofOs\resources\views/pages/about.blade.php ENDPATH**/ ?>