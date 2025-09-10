

<?php $__env->startSection('content'); ?>
  
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <!-- Breadcrumb -->
      <div class="container d-flex justify-content-between flex-md-row">
        <div>
          <h5 class="py-3 mb-3 small"><span class="text-muted fw-light"><a href="<?php echo e(url('/home')); ?>">Dashboard</a> / <a href="<?php echo e(url('/roles')); ?>">Roles</a> / </span> <?php echo e($title); ?></h5>
        </div>
      </div>
      <!-- Breadcrumb -->

      <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <div class="row">
        <div class="col-xl">
        
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Role: <?php echo e($role->name); ?></h5>

                    <small class="text-muted float-end">
                        <div class="form-check">
                            <label class="form-check-label">
                                CHECK ALL
                                <input type="checkbox" id="check-all" class="form-check-input" value="">
                            </label>
                        </div>
                    </small>
                </div>

                <div class="divider divider-dashed">
                    <h3 class="divider-text text-success">PERMISSIONS LIST</h3>
                </div>

                <div class="card-body p-4">
                    <form action="<?php echo e(url('roles/'.encrypt($role->id).'/add_permission_to_role')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            
                            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'super-admin')): ?>
                            <div class="row">
                                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-3 form-check mb-3">
                                        <label>
                                            <input type="checkbox" 
                                            name="permission[]" 
                                            class="form-check-input check-all" 
                                            value="<?php echo e($permission->name); ?>" 
                                            <?php echo e(in_array($permission->id, $role_permissions) ? 'checked' : ''); ?>>
                                         
                                            <?php echo e(strtoupper($permission->name)); ?>

                                        </label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="submit-section text-center">
                            <button class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
      </div>
    </div>
    <!-- / Content -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function(){
            $('#check-all').on('change',function (){
                if($('#check-all')[0].checked){
                    $('.check-all').prop('checked', true);
                }else{
                    $('.check-all').prop('checked', false);
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>








<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Repository\bs-pcac\resources\views/role-permission/role/add-permission.blade.php ENDPATH**/ ?>