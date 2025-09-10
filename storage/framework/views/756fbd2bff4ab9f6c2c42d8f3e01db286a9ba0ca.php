

<?php $__env->startSection('content'); ?>
  
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <!-- Breadcrumb -->
      <div class="container d-flex justify-content-between flex-md-row">
        <div>
          <h5 class="py-3 mb-3 small"><span class="text-muted fw-light"><a href="<?php echo e(url('/home')); ?>">Dashboard</a> / </span> <?php echo e($title); ?></h5>
        </div>
        <div class="text-right">
          <button type="button" class="btn rounded-pill btn-primary" data-bs-toggle="modal" data-bs-target="#add_modal">
          Add User   
          </button>
        </div>
      </div>
      <!-- Breadcrumb -->

      <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <div class="row">
        <div class="col-xl">
          <div class="card mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped custom-table mb-0 small">
                  <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="30%">Name</th>
                        <th width="35%">Email</th>
                        <th width="15%">Roles</th>
                        <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;
                    ?>
                    <?php if(count($users) > 0): ?>
                      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($count++); ?></td>
                        <td><?php echo e(strtoupper($user->name)); ?></td>
                        <td><?php echo e(strtolower($user->email)); ?></td>
                        <td>
                           <?php if(!empty($user->getRoleNames())): ?>
                               <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rolename): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <label class="badge bg-info text-white mx-1"><?php echo e(ucwords($rolename)); ?></label>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?> 
                        </td>
                        <td>
                          <a href="button" id="edit_modal_<?php echo e($user->id); ?>" class="btn btn-xs p-3 rounded-pill btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#edit_modal<?php echo e($user->id); ?>">
                            <span class="tf-icons bx bx-pencil"></span>
                          </a>

                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('suspend user')): ?>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal<?php echo e($user->id); ?>">
                            <span class="tf-icons bx bx-trash"></span>
                          </a>
                          <?php endif; ?>

                          <!-- Edit modal -->
                          <div class="modal fade" id="edit_modal<?php echo e($user->id); ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel1">Edit Permission</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <form action="<?php echo e(url('users/'.$user->id)); ?>" method="post" enctype="multipart/form-data">
                                  <?php echo csrf_field(); ?>
                                  <?php echo method_field('PUT'); ?>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <input class="form-control" value="<?php echo e(strtoupper($user->name)); ?>" type="text" name="name" required>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                        <input class="form-control" value="<?php echo e(strtolower($user->email)); ?>" type="text" name="email" required>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Role <span class="text-danger">*</span></label>
                                        <select name="roles[]" class="select2 form-control w-100" multiple required>
                                            <option value="">--Choose Role--</option>
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option 
                                            <?php
                                                $user_roles = $user->roles->pluck('name','name')->all();
                                            ?>
                                            <?php echo e(in_array($role, $user_roles) ? 'selected':''); ?>

                                            value="<?php echo e($role); ?>"
                                            >
                                                <?php echo e(ucwords($role)); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                      </div>
                                    </div>                                    
                                  </div>

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                      Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- //Edit modal -->
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete user')): ?>
                          <!-- Delete -->
                          <div class="modal fade" id="delete_modal<?php echo e($user->id); ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header text-center d-inline">
                                  <h5 class="modal-title">Delete Confirm</h5>
                                </div>
                                
                                <div class="text-center pt-2 pb-4">
                                  <div>
                                    <p class="mb-3">Are you sure want to delete?</p>
                                  </div>
                                  <div>
                                    <button type="button" class="btn rounded-pill btn-secondary" data-bs-dismiss="modal">
                                      Cancel
                                    </button>
                                    <a href="<?php echo e(url('users/'.encrypt($user->id).'/delete')); ?>" class="btn rounded-pill btn-primary">Delete</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- //Delete -->
                          <?php endif; ?>
                        </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <tr>
                      <td colspan="5">
                        <p class="alert alert-danger text-center">No record found!</p>
                      </td>
                    </tr>
                    <?php endif; ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->

  <!-- Modal -->
  <div class="modal fade" id="add_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form action="<?php echo e(url('/users')); ?>" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Name <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="name" value="<?php echo e(old('name')); ?>" required>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="email" value="<?php echo e(old('email')); ?>" required>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" value="<?php echo e(old('')); ?>" required>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password_confirmation" value="<?php echo e(old('')); ?>" required>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Role <span class="text-danger">*</span></label>
                <select name="roles[]" class="select2 form-control w-100" multiple required>
                    <option value="">--Choose Role--</option>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($role); ?>"><?php echo e(strtoupper($role)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        // Initialize Select2 on modal show
        $('#add_modal').on('shown.bs.modal', function () {
            $('.select2').select2({
                dropdownParent: $('#add_modal')  // Ensure Select2 dropdown is attached to the modal
            });
            
        });

        
        $('#edit_modal').on('shown.bs.modal', function () {
            $('.select2').select2({
                dropdownParent: $('#edit_modal')  // Ensure Select2 dropdown is attached to the modal
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Repository\bs-pcac\resources\views/user/index.blade.php ENDPATH**/ ?>