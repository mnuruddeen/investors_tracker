
<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('inc.main_slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="page-section" id="about">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 py-2 wow fadeInUp">
              <span class="subhead">About us</span>
              <h2 class="title-section"><?php echo e(config('app.name')); ?></h2>
              <div class="divider"></div>

              <p><?php echo e($about->description); ?></p>
              <a href="<?php echo e(url('about-us')); ?>" class="btn btn-primary mt-3">Read More</a>
            </div>
            <div class="col-lg-6 py-3 wow fadeInRight">
              <div class="img-fluid py-3 text-center">
                <img src="<?php echo e(asset('main/img/banner_image_2.svg')); ?>" alt="">
              </div>
            </div>
          </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->


    <div class="page-section banner-seo-check">
        <div class="wrap bg-image" style="background-image: url(../assets/img/bg_pattern.svg);">
          <div class="container text-center">
            <div class="row justify-content-center wow fadeInUp">
              <div class="col-lg-8">
                <h2 class="mb-4">Search CofOs here</h2>
                <form action="#">
                  <input type="text" class="form-control" placeholder="">
                  <button type="submit" class="btn btn-success">Check Now</button>
                </form>
              </div>
            </div>
          </div> <!-- .container -->
        </div> <!-- .wrap -->
    </div> <!-- .page-section -->

    <div class="page-section">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <div class="card-service wow fadeInUp">
                <div class="header">
                  <img src="<?php echo e(asset('main/img/services/service-1.svg')); ?>" alt="">
                </div>
                <div class="body">
                  <h5 class="text-secondary">CofOs Collection & Analysis</h5>
                  <p>Powerful and intuitive CofOs data collection tools to make an impact to the state an the national at large.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-4">
              <div class="card-service wow fadeInUp">
                <div class="header">
                  <img src="<?php echo e(asset('main/img/services/service-2.svg')); ?>" alt="">
                </div>
                <div class="body">
                  <h5 class="text-secondary">CofOs Management</h5>
                  <p>We help generate high quality data to inform organizations working globally in humanitarian response</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-4">
              <div class="card-service wow fadeInUp">
                <div class="header">
                  <img src="<?php echo e(asset('main/img/services/service-3.svg')); ?>" alt="">
                </div>
                <div class="body">
                  <h5 class="text-secondary">Access to CofOs</h5>
                  <p>We develop data tools designed for access and retrieval of CofOs efficiently</p>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mukht\Desktop\New Projects\CofOs\resources\views/index.blade.php ENDPATH**/ ?>