
<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('inc.main_slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- Banner Start -->
    <div class="container-fluid banner mb-5">
        <div class="container">
            <div class="row gx-0">
                <div class="col-lg-6 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary d-flex flex-column p-5" style="height: 300px;">
                        <div class="text-center text-white mb-3">
                            <span class="fa fa-book fa-2x"></span>
                        </div>
                        <h3 class="text-white mb-3 text-center"><?php echo e($mission->title); ?></h3>
                        <div class="d-flex justify-content-between text-white mb-3">
                            <p class="mb-0 text-justify"> <?php echo e($mission->description); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-info d-flex flex-column p-5" style="height: 300px;">
                        <div class="text-center text-white mb-3">
                            <span class="fa fa-eye fa-2x"></span>
                        </div>
                        <h3 class="text-white mb-3 text-center"><?php echo e($vision->title); ?></h3>
                        <div class="d-flex justify-content-between text-white mb-3">
                            <p class="mb-0 text-justify"> <?php echo e($vision->description); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Start -->

    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <?php if($about->image): ?>
                            <img class="img-thumbnail position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="<?php echo e(asset('main/img/abouts/'.$about->image)); ?>" style="object-fit: cover;">
                        <?php else: ?>
                            <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="<?php echo e(asset('main/img/logo.png')); ?>" style="object-fit: cover;">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">About Us</h5>
                        <h1 class="display-6 mb-0"><?php echo e(config('app.name')); ?></h1>
                    </div>
                    
                    <p class="mb-4 text-justify">
                        <?php echo e($about->description); ?>

                    </p>

                    <a href="<?php echo e(url('about-us')); ?>" class="btn btn-primary py-3 px-5 mt-4 wow zoomIn" data-wow-delay="0.6s">Read more</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Main Objectives Start -->
    <div class="container-fluid bg-primary bg-appointment my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-12 py-5">
                    <div class="py-2 text-center">
                        <h1 class="display-5 text-white mb-4 text-center"><?php echo e($concept->title); ?></h1>
                        <p class="text-white mb-2"><?php echo e($concept->description); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Objectives End -->
    
    <!-- News Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title mb-4">
                <h5 class="position-relative d-inline-block text-primary text-uppercase">RECENT POST</h5>
            </div>

            <div class="row g-5">
                <?php if(count($news) > 0): ?>
                    <?php $delay = "0.3";  ?>
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="<?php echo e($delay += 0.3); ?>s">
                        <div class="blog-item bg-light rounded overflow-hidden">
                            <div class="blog-img position-relative overflow-hidden">
                                <a href="<?php echo e(url('latest-news/'.encrypt($blog->id))); ?>">
                                    <img class="img-fluid" src="<?php echo e(asset('main/img/news/'.$blog->cover_img)); ?>" alt="">
                                    <a class="position-absolute top-0 start-0 bg-info text-white rounded-end mt-5 py-2 px-4"><?php echo e($blog->category->name); ?></a>
                                </a>
                            </div>
                            <div class="p-4">
                                <div class="d-flex mb-3">
                                    <small class="me-3"><i class="far fa-user text-primary me-2"></i>Administrator</small>
                                    <small><i class="far fa-calendar-alt text-primary me-2"></i><?php echo e(date('d M, Y', strtotime($blog->created_at))); ?></small>
                                </div>
                                <h5 class="mb-3"><?php echo e($blog->title); ?></h5>
                                <p><?php echo e(substr($blog->body,0,73)); ?>...</p>
                                <a class="text-uppercase" href="<?php echo e(url('latest-news/'.encrypt($blog->id))); ?>">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="col-lg-12 wow slideInUp" data-wow-delay="0.3s">
                        <div class="blog-item bg-light rounded overflow-hidden">
                            <div class="p-4 text-center">
                                <!-- <h4 class="mb-3">No News Found!</h4> -->
                                <p>No News Found!</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- News Start -->

    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title bg-light rounded h-100 p-5">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Our Team and Experts</h5>
                        <h1 class="display-6 mb-4">Managemet Team</h1>
                    </div>
                </div>
                <?php if(count($teams) > 0): ?>
                    <?php $delay = "0.3";  ?>
                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="<?php echo e($delay += 0.3); ?>s">
                        <div class="team-item">
                            <div class="team-img position-relative rounded-top" style="z-index: 1;">
                                <img class="img-fluid rounded-top w-100" src="<?php echo e(asset('main/img/teams/'.$team->image)); ?>" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                    <a class="btn btn-primary btn-square m-1" href="<?php echo e($team->twitter); ?>" target="_blank"><i class="fab fa-twitter fw-normal"></i></a>
                                    <a class="btn btn-primary btn-square m-1" href="<?php echo e($team->facebook); ?>" target="_blank"><i class="fab fa-facebook-f fw-normal"></i></a>
                                    <a class="btn btn-primary btn-square m-1" href="<?php echo e($team->instagram); ?>"><i class="fab fa-instagram fw-normal"></i></a>
                                </div>
                            </div>
                            <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                                <h4 class="mb-2"><?php echo e($team->name); ?></h4>
                                <p class="text-primary mb-0"><?php echo e($team->rank); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Vendor Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 mb-5">
            <div class="row">
                <div class="bg-dark">
                    <div class="owl-carousel vendor-carousel">
                        <?php if(count($partners) > 0): ?>
                            <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img src="<?php echo e(asset('main/img/partners/'.$partner->logo)); ?>" alt="">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Repository\bs-pcac\resources\views/index.blade.php ENDPATH**/ ?>