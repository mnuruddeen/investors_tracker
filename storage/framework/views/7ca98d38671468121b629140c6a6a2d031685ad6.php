<?php $__env->startSection('content'); ?>

    <div class="container">
      <div class="row mt-4">
        <div class="col-lg-3 col-md-3 col-3 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0 text-success">
                  <i class="bx bx-user bx-md"></i>
                </div>
                <div class="dropdown">
                  <h3 class="card-title mb-2"><?php echo e(number_format($certificates->count())); ?></h3>
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Total CofOs</span>
            </div>
          </div>
        </div>
        <?php $__currentLoopData = $ownerships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-3 col-md-3 col-3 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0 text-info">
                  <i class="bx bx-male bx-md"></i>
                </div>
                <div class="dropdown">
                  <h3 class="card-title mb-2"><?php echo e(number_format($certificates->where('ownership_type_id',$o->id)->count())); ?></h3>
                </div>
              </div>
              <span class="fw-semibold d-block mb-1"><?php echo e($o->name); ?></span>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php $__currentLoopData = $owners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-3 col-md-3 col-3 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0 text-warning">
                  <i class="bx bx-female bx-md"></i>
                </div>
                <div class="dropdown">
                  <h3 class="card-title mb-2"><?php echo e(number_format($certificates->where('owner_type_id',$o->id)->count())); ?></h3>
                </div>
              </div>
              <span class="fw-semibold d-block mb-1"><?php echo e($o->name); ?></span>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-3 col-md-3 col-3 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0 text-primary">
                  <i class="bx bx-male bx-md"></i>
                </div>
                <div class="dropdown">
                  <h3 class="card-title text-nowrap mb-1"><?php echo e($certificates->where('owner_gender','Male')->count()); ?></h3>
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Male Owned</span>
            </div>
          </div>
        </div>

          <div class="col-lg-3 col-md-3 col-3 mb-4">
              <div class="card">
                  <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0 text-primary">
                              <i class="bx bx-female bx-md"></i>
                          </div>
                          <div class="dropdown">
                              <h3 class="card-title text-nowrap mb-1"><?php echo e($certificates->where('owner_gender','Female')->count()); ?></h3>
                          </div>
                      </div>
                      <span class="fw-semibold d-block mb-1">Female Owned</span>
                  </div>
              </div>
          </div>

          <div class="col-lg-3 col-md-3 col-3 mb-4">
              <div class="card">
                  <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0 text-primary">
                              <i class="bx bx-wallet bx-md"></i>
                          </div>
                          <div class="dropdown">
                              <h3 class="card-title text-nowrap mb-1"><?php echo e($certificates->where('owner_gender','Others')->count()); ?></h3>
                          </div>
                      </div>
                      <span class="fw-semibold d-block mb-1">Others Owned</span>
                  </div>
              </div>
          </div>

      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('assets/js/dashboards-analytics.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mukht\Desktop\New Projects\CofOs\resources\views/home.blade.php ENDPATH**/ ?>