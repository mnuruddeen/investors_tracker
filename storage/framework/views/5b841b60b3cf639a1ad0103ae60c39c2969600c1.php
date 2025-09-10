

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
          Add Member   
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
                      <th width="15%">Image</th>
                      <th width="25%">Name</th>
                      <th width="25%">Rank</th>
                      <th width="10%">Status</th>
                      <th width="20%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;
                    ?>
                    <?php if(count($teams) > 0): ?>
                      <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($count++); ?></td>
                        <td>
                          <?php if($team->image): ?>
                          <img src="<?php echo e(asset('main/img/teams/'.$team->image)); ?>" class="" height="70" width="70">
                          <?php endif; ?>
                        </td>
                        <td><?php echo e($team->name); ?></td>
                        <td><?php echo e(strtoupper($team->rank)); ?></td>
                        <td>
                          <?php if($team->status): ?>
                            <span class="badge bg-success">Active</span>
                          <?php else: ?>
                            <span class="badge bg-danger">Inactive</span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#edit_modal<?php echo e($team->id); ?>">
                            <span class="tf-icons bx bx-pencil"></span>
                          </a>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal<?php echo e($team->id); ?>">
                            <span class="tf-icons bx bx-trash"></span>
                          </a>
                          <!-- Edit modal -->
                          <div class="modal fade" id="edit_modal<?php echo e($team->id); ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel1">Edit <?php echo e($title); ?></h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <form action="<?php echo e(url('teams/'.$team->id)); ?>" method="post" enctype="multipart/form-data">
                                  <?php echo csrf_field(); ?>
                                  <?php echo method_field('PUT'); ?>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Change Image</label>
                                        <input type="file" name="document" class="form-control"/>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="<?php echo e($team->name); ?>" class="form-control" required/>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Rank <span class="text-danger">*</span></label>
                                        <input type="text" name="rank" value="<?php echo e($team->rank); ?>" class="form-control" required/>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Facebook </label>
                                        <input type="text" name="facebook" value="<?php echo e($team->facebook); ?>" class="form-control"/>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Twitter </label>
                                        <input type="text" name="twitter" value="<?php echo e($team->twitter); ?>" class="form-control"/>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Instagram </label>
                                        <input type="text" name="instagram" value="<?php echo e($team->instagram); ?>" class="form-control"/>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">LinkedIn </label>
                                        <input type="text" name="linkedin" value="<?php echo e($team->linkedin); ?>" class="form-control"/>
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
                          <!-- Delete -->
                          <div class="modal fade" id="delete_modal<?php echo e($team->id); ?>" tabindex="-1" aria-hidden="true">
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
                                    <a href="<?php echo e(url('teams/'.encrypt($team->id).'/delete')); ?>" class="btn rounded-pill btn-primary">Delete</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- //Delete -->
                        </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <tr>
                      <td colspan="6">
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
        <p class="m-4 alert alert-warning text-center dashed">
          <strong>Note: </strong> Image must be 500 x 450 dimenstion
        </p>
        <form action="<?php echo e(url('/teams')); ?>" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="document" class="form-control" required/>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" required />
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Rank <span class="text-danger">*</span></label>
                <input type="text" name="rank" class="form-control" required/>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Facebook </label>
                <input type="text" name="facebook" class="form-control"/>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Twitter </label>
                <input type="text" name="twitter" class="form-control"/>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Instagram </label>
                <input type="text" name="instagram" class="form-control"/>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">LinkedIn </label>
                <input type="text" name="linkedin" class="form-control"/>
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
  
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Repository\bs-pcac\resources\views/team/index.blade.php ENDPATH**/ ?>