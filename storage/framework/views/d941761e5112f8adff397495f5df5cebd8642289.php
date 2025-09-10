

<?php $__env->startSection('content'); ?>
  
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <!-- Breadcrumb -->
    <div class="container d-flex justify-content-between flex-md-row">
      <div>
        <h5 class="py-3 mb-3 small"><span class="text-muted fw-light"><a href="<?php echo e(url('/home')); ?>">Dashboard</a> / </span> <?php echo e($title); ?></h5>
      </div>
    </div>
    <!-- Breadcrumb -->

    <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?php echo e($title); ?></h5>
          </div>
          <div class="card-body">
            <form action="<?php echo e(url('cases')); ?>" method="post">
              <?php echo csrf_field(); ?>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Case Category</label>
                <div class="input-group input-group-merge">
                  <select name="category" class="select2 form-control w-100" required>
                    <option value="">--Choose--</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->id); ?>">
                        <?php echo e(ucwords($cat->name)); ?>

                    </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-company">Case Title</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-company2" class="input-group-text"
                    ><i class="bx bx-buildings"></i
                  ></span>
                  <input
                    type="text"
                    name="title"
                    id="basic-icon-default-company"
                    class="form-control"
                    placeholder="Case Title."
                    aria-label="Case Title."
                    aria-describedby="basic-icon-default-company2" required
                  />
                </div>
              </div>
              
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-date">Date</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-date" class="input-group-text"
                    ><i class="bx bx-calendar"></i
                  ></span>
                  <input
                    type="date"
                    name="case_date"
                    class="form-control"
                    id="basic-icon-default-date"
                    aria-describedby="basic-icon-default-date" required
                  />
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-message">Description</label>
                <div class="input-group input-group-merge">
                  
                  <textarea
                    id="basic-icon-default-message"
                    class="form-control"
                    name="description"
                    placeholder="Description of the case"
                    aria-label="Description of the case"
                    aria-describedby="basic-icon-default-message2" rows="4" required
                  ></textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  <!-- / Content -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
  
<?php $__env->stopPush(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Repository\bs-pcac\resources\views/case/create.blade.php ENDPATH**/ ?>