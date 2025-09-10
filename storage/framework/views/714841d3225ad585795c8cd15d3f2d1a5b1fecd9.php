<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php if(count($sliders) > 0): ?>
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php echo e(($slider->id == 1)?'active':''); ?>">
                    <img class="w-100" src="<?php echo e(asset('main/img/slides/'.$slider->image)); ?>" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown"><?php echo e($slider->title_1); ?></h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn"><?php echo e($slider->title_2); ?></h1>
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown"><?php echo e($slider->title_3); ?></h5>
                            <a href="<?php echo e(url('about-us')); ?>" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">About Us</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="carousel-item">
                    <img class="w-100" src="<?php echo e(asset('main/img/slides/sample.jpg')); ?>" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Sample Text 1</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Sample Text 2</h1>
                            <a href="<?php echo e(url('contact-us')); ?>" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->

<?php /**PATH C:\Users\HP\Desktop\Repository\bs-pcac\resources\views/inc/main_slider.blade.php ENDPATH**/ ?>