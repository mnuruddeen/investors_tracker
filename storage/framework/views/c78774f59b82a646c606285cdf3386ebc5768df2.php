
<?php $__env->startSection('content'); ?>

<!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      

      <div class="row mt-5">
        <div class="col-xl">
          <div class="col-md-5 card m-auto shadow-lg p-4">
            <h4 class="mb-5 text-center">Change Password? 🔒</h4>
            <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form  action="<?php echo e(url('change-password')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label>Current Password <span class="text-danger">*</span></label>
                            <input type="password" name="current-password" class="form-control" placeholder="Current Password">
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label>New Password <span class="text-danger">*</span></label>
                            <input type="password" name="new-password" class="form-control" placeholder="New Password">
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label>Confirm New Password <span class="text-danger">*</span></label>
                            <input type="password" name="new-password_confirmation" class="form-control" placeholder="Confirm New Password">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <button class="btn btn-success">Save Changes</button>
                </div>
            </form>
        </div>
        </div>
      </div>
    </div>
    <!-- / Content -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Desktop\Repository\CofOs\resources\views/user/change_password.blade.php ENDPATH**/ ?>