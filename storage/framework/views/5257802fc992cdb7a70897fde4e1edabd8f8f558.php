

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
          Add Role   
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
                      <th width="75%">Role Name</th>
                      <th width="20%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;
                    ?>
                    <?php if(count($roles) > 0): ?>
                      <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($count++); ?></td>
                        <td><?php echo e($role->name); ?></td>
                        <td>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#edit_modal<?php echo e($role->id); ?>">
                            <span class="tf-icons bx bx-pencil"></span>
                          </a>

                          <a href="<?php echo e(url('roles/'.encrypt($role->id).'/add_permission_to_role')); ?>" class="btn btn-xs p-3 rounded-pill btn-icon btn-info"  data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-plus bx-xs' ></i> <span>Permissions to Role</span>"> 
                            <span class="tf-icons bx bx-plus"></span>
                          </a>

                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete role')): ?>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal<?php echo e($role->id); ?>">
                            <span class="tf-icons bx bx-trash"></span>
                          </a>
                          <?php endif; ?>

                          <!-- Edit modal -->
                          <div class="modal fade" id="edit_modal<?php echo e($role->id); ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel1">Edit <?php echo e($title); ?></h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <form action="<?php echo e(url('roles/'.$role->id)); ?>" method="post" enctype="multipart/form-data">
                                  <?php echo csrf_field(); ?>
                                  <?php echo method_field('PUT'); ?>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Role Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="<?php echo e($role->name); ?>" class="form-control" required />
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
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete role')): ?>
                          <!-- Delete -->
                          <div class="modal fade" id="delete_modal<?php echo e($role->id); ?>" tabindex="-1" aria-hidden="true">
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
                                    <a href="<?php echo e(url('roles/'.encrypt($role->id).'/delete')); ?>" class="btn rounded-pill btn-primary">Delete</a>
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
                      <td colspan="3">
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
          <h5 class="modal-title" id="exampleModalLabel1">Add <?php echo e($title); ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form action="<?php echo e(url('/roles')); ?>" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Role Name <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="name" value="<?php echo e(old('name')); ?>" required>
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




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Repository\bs-pcac\resources\views/role-permission/role/index.blade.php ENDPATH**/ ?>