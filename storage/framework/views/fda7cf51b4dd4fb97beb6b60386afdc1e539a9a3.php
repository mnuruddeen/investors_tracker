
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
          Add Course   
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
                      <th width="10%">Code</th>
                      <th width="40%">Course Title</th>
                      <th width="5%">Unit</th>
                      <th width="25%">Program</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;
                    ?>
                    <?php if(count($courses) > 0): ?>
                      <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($count++); ?></td>
                        <td><?php echo e(strtoupper($c->code)); ?></td>
                        <td><?php echo e(strtoupper($c->title)); ?></td>
                        <td><?php echo e(strtoupper($c->unit)); ?></td>
                        <td><?php echo e(strtoupper($c->program->program)); ?></td>
                        <td>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#edit_modal<?php echo e($c->id); ?>">
                            <span class="tf-icons bx bx-pencil"></span>
                          </a>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal<?php echo e($c->id); ?>">
                            <span class="tf-icons bx bx-trash"></span>
                          </a>
                          <!-- Edit modal -->
                          <div class="modal fade" id="edit_modal<?php echo e($c->id); ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel1">Edit <?php echo e($title); ?></h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <form action="<?php echo e(url('courses/'.$c->id)); ?>" method="post">
                                  <?php echo csrf_field(); ?>
                                  <?php echo method_field('PUT'); ?>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">School</label>
                                        <select class="form-control w-100" name="school" id="school_e" required>
                                          <option value=""> --Select-- </option>
                                          <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($school->id); ?>" <?php if($c->program->department->school->id == $school->id): ?><?php echo e("selected"); ?><?php endif; ?>><?php echo e($school->school); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Department</label>
                                        <select class="form-control w-100" name="department" id="department_e" required>
                                          <option value="<?php echo e($c->program->department->id); ?>" selected> <?php echo e($c->program->department->department); ?> </option>
                                          
                                        </select>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Program</label>
                                        <select class="form-control w-100" name="program" id="program_e" required>
                                          <option value="<?php echo e($c->program->id); ?>" selected> <?php echo e($c->program->program); ?> </option>
                                          
                                        </select>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Course Title</label>
                                        <input type="text" name="course" id="nameBasic" class="form-control" placeholder="Course Title" value="<?php echo e($c->title); ?>" required />
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Course Code</label>
                                        <input type="text" name="code" id="nameBasic" class="form-control" placeholder="Course Code" value="<?php echo e($c->code); ?>" required />
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Course Unit</label>
                                        <input type="text" name="unit" id="nameBasic" class="form-control" placeholder="Course Unit" value="<?php echo e($c->unit); ?>" required />
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
                          <div class="modal fade" id="delete_modal<?php echo e($c->id); ?>" tabindex="-1" aria-hidden="true">
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
                                    <a href="<?php echo e(url('courses/'.encrypt($c->id).'/delete')); ?>" class="btn rounded-pill btn-primary">Delete</a>
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
        
        <form action="<?php echo e(url('/courses')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">School</label>
                <select class="form-control w-100" name="school" id="school" required>
                  <option value=""> --Select-- </option>
                  <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($school->id); ?>"><?php echo e($school->school); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Department</label>
                <select class="form-control w-100" name="department" id="department" required>
                  <option value=""> --Select-- </option>
                  
                </select>
              </div>
            </div>

             <div class="row">
              <div class="col mb-3">
                <label class="form-label">Program</label>
                <select class="form-control w-100" name="program" id="program" required>
                  <option value=""> --Select-- </option>
                  
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Course Title</label>
                <input type="text" name="course" id="nameBasic" class="form-control" placeholder="Course Title" required />
              </div>
            </div>

            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Course Code</label>
                <input type="text" name="code" id="nameBasic" class="form-control" placeholder="Course Code" required />
              </div>
            </div>

            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Course Unit</label>
                <input type="number" name="unit" id="nameBasic" class="form-control" placeholder="Course Unit" required />
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-success">Add Course</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
  <script>
    $(document).ready(function() {
      $('#school').on('change', function () {
        var id = $('#school').val();
        $('#department').empty();
        $('#department').append(`<option value="" disabled selected>Processing...</option>`);
        $.ajax({
            type: 'GET',
            url: '../../get_department/' + id,
            success: function (response) {
              var response = JSON.parse(response);
              //console.log(response);
              $('#department').empty();
              $('#department').append(`<option value="" disabled selected>--Select--</option>`);
              response.forEach(element => {
                  $('#department').append(`<option value="${element['id']}">${element['department']}</option>`);
              });
            }
        });
      });  
    });

    $(document).ready(function() {
      $('#school_e').on('change', function () {
        var id = $('#school_e').val();
        $('#department_e').empty();
        $('#department_e').append(`<option value="" disabled selected>Processing...</option>`);
        $.ajax({
            type: 'GET',
            url: '../../get_department/' + id,
            success: function (response) {
              var response = JSON.parse(response);
              //console.log(response);
              $('#department_e').empty();
              $('#department_e').append(`<option value="" disabled selected>--Select--</option>`);
              response.forEach(element => {
                  $('#department_e').append(`<option value="${element['id']}">${element['department']}</option>`);
              });
            }
        });
      });
    });

    //DEPAERTMENT
    $(document).ready(function() {
      $('#department').on('change', function () {
        var id = $('#department').val();
        $('#program').empty();
        $('#program').append(`<option value="" disabled selected>Processing...</option>`);
        $.ajax({
            type: 'GET',
            url: '../../get_program/' + id,
            success: function (response) {
              var response = JSON.parse(response);
              console.log(response);
              $('#program').empty();
              $('#program').append(`<option value="" disabled selected>--Select--</option>`);
              response.forEach(element => {
                  $('#program').append(`<option value="${element['id']}">${element['program']}</option>`);
              });
            }
        });
      });
    });

    //DEPAERTMENT EDIT
    $(document).ready(function() {
      $('#department_e').on('change', function () {
        var id = $('#department_e').val();
        $('#program_e').empty();
        $('#program_e').append(`<option value="" disabled selected>Processing...</option>`);
        $.ajax({
            type: 'GET',
            url: '../../get_program/' + id,
            success: function (response) {
              var response = JSON.parse(response);
              console.log(response);
              $('#program_e').empty();
              $('#program_e').append(`<option value="" disabled selected>--Select--</option>`);
              response.forEach(element => {
                  $('#program_e').append(`<option value="${element['id']}">${element['program']}</option>`);
              });
            }
        });
      });
    });

  


  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Repository\cbt\resources\views/course/index.blade.php ENDPATH**/ ?>