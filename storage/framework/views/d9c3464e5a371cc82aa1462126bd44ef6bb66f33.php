

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
          Add Rank   
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
                      <th width="60%">Rank Name</th>
                      <th width="20%">Grade Level</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;
                    ?>
                    <?php if(count($ranks) > 0): ?>
                      <?php $__currentLoopData = $ranks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($count++); ?></td>
                        <td><?php echo e($rank->rank); ?></td>
                        <td><?php echo e($rank->grade_level); ?></td>
                        <td>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#edit_modal<?php echo e($rank->id); ?>">
                            <span class="tf-icons bx bx-pencil"></span>
                          </a>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal<?php echo e($rank->id); ?>">
                            <span class="tf-icons bx bx-trash"></span>
                          </a>
                          <!-- Edit modal -->
                          <div class="modal fade" id="edit_modal<?php echo e($rank->id); ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel1">Edit <?php echo e($title); ?></h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <form action="<?php echo e(url('ranks/'.$rank->id)); ?>" method="post" enctype="multipart/form-data">
                                  <?php echo csrf_field(); ?>
                                  <?php echo method_field('PUT'); ?>
                                  <div class="modal-body">
                                    <div class="form-group mb-3">
                                      <label>Cadre <span class="text-danger">*</span></label>
                                      <select class="form-control w-100"  name="cadre" id="cadre" required>
                                          <option value=""> --Select-- </option>
                                          <?php $__currentLoopData = $cadres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($c->id); ?>" <?php echo e(($c->id == $rank->cadre_id) ? 'selected':''); ?>><?php echo e($c->cadre); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </select>
                                    </div>

                                    <div class="form-group mb-3">
                                      <label>Rank Name <span class="text-danger">*</span></label>
                                      <input class="form-control" type="text" name="rank" value="<?php echo e($rank->rank); ?>" required>
                                  </div>
                                  <div class="form-group mb-3">
                                      <label>Grade Level <span class="text-danger">*</span></label>
                                      <input class="form-control" type="text" name="grade_level" value="<?php echo e($rank->grade_level); ?>" required>
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
                          <div class="modal fade" id="delete_modal<?php echo e($rank->id); ?>" tabindex="-1" aria-hidden="true">
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
                                    <a href="<?php echo e(url('ranks/'.encrypt($rank->id).'/delete')); ?>" class="btn rounded-pill btn-primary">Delete</a>
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
                      <td colspan="4">
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
        
        <form action="<?php echo e(url('/ranks')); ?>" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="modal-body">
            <div class="form-group mb-3">
              <label>Cadre <span class="text-danger">*</span></label>
              <select class="form-control w-100"  name="cadre" id="cadre" required>
                  <option value=""> --Select-- </option>
                  <?php $__currentLoopData = $cadres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($c->id); ?>"><?php echo e($c->cadre); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="table-responsive mt-3 mb-3">
              <table width="100%" class="table-striped table-bordered custom-table mb-0 small" cellpadding="6">
                  <thead>
                  <tr>
                      <th width="5%">#</th>
                      <th width="75%">Rank</th>
                      <th width="20%">Grade Level</th>
                  </tr>
                  </thead>
                  <tbody id="table">

                  </tbody>
              </table>
            </div>
            <div class="form-group mb-3">
                <label>Rank Name <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="rank" value="<?php echo e(old('rank')); ?>" required>
            </div>
            <div class="form-group mb-3">
                <label>Grade Level <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="grade_level" value="<?php echo e(old('grade_level')); ?>" required>
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
  $(document).ready(function() {

      $('#cadre').on('change', function () {
          var id = $('#cadre').val();
          $('#table').empty();
          $.ajax({
              type: 'GET',
              url: '../../get_rank/' + id,
              success: function (response) {
                  var response = JSON.parse(response);
                  //console.log(response);
                  let i = 1;
                  $('#table').empty();
                  response.forEach(element => {
                      $('#table').append(`<tr><td>${i++}</td><td>${element['rank']}</td><td>${element['grade_level']}</td></tr>`);
                  });
              }
          });
      });

  });
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Repository\bs-pcac\resources\views/rank/index.blade.php ENDPATH**/ ?>