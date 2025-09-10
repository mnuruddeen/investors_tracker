

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
          Add Employee   
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
                      <th width="20%">PSN</th>
                      <th width="35%">Name</th>
                      <th width="20%">Rank</th>
                      <th width="5%">Status</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;
                    ?>
                    <?php if(count($employees) > 0): ?>
                      <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($count++); ?></td>
                        <td><?php echo e($employee->psn); ?></td>
                        <td>
                          <a href="<?php echo e(url('employees/'.encrypt($employee->id))); ?>"> 
                            <?php echo e(strtoupper($employee->full_name)); ?>

                          </a>
                        </td>
                        <td><?php echo e(strtoupper($employee->rank->rank)); ?></td>
                        <td>
                          <?php if($employee->status): ?>
                            <span class="badge bg-success">Active</span>
                          <?php else: ?>
                            <span class="badge bg-danger">Inactive</span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <a href="<?php echo e(url('employees/'.encrypt($employee->id))); ?>" class="btn btn-xs p-3 rounded-pill btn-icon btn-primary">
                            <span class="tf-icons bx bx-low-vision"></span>
                          </a>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal<?php echo e($employee->id); ?>">
                            <span class="tf-icons bx bx-trash"></span>
                          </a>
                          <!-- Edit modal -->
                          <div class="modal fade" id="edit_modal<?php echo e($employee->id); ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel1">Edit <?php echo e($title); ?></h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <form action="<?php echo e(url('employees/'.$employee->id)); ?>" method="post" enctype="multipart/form-data">
                                  <?php echo csrf_field(); ?>
                                  <?php echo method_field('PUT'); ?>
                                  <div class="modal-body">
                                    
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
                          <div class="modal fade" id="delete_modal<?php echo e($employee->id); ?>" tabindex="-1" aria-hidden="true">
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
                                    <a href="<?php echo e(url('employees/'.encrypt($employee->id).'/delete')); ?>" class="btn rounded-pill btn-primary">Delete</a>
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
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Add <?php echo e($title); ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?php echo e(url('/employees')); ?>" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="modal-body">
            <div class="row mb-3">
              <div class="col">
                <label class="form-label">PSN <span class="text-danger">*</span></label>
                <input type="text" name="psn" class="form-control" required />
              </div>
              <div class="col">
                <label class="form-label">First Name <span class="text-danger">*</span></label>
                <input type="text" name="first_name" class="form-control" required />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label class="form-label">Middle Name</label>
                <input type="text" name="middle_name" class="form-control"/>
              </div>
              <div class="col">
                <label class="form-label">Last Name <span class="text-danger">*</span></label>
                <input type="text" name="last_name" class="form-control" required />
              </div>
            </div>

            <div class="row mb-3">
              <div class="col">
                <label class="form-label">Gender <span class="text-danger">*</span></label>
                <select class="form-control" name="gender" required>
                    <option value=""> --Select-- </option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
              </div>
              <div class="col">
                <label class="form-label">Marital status <span class="text-danger">*</span></label>
                <select class="form-control" name="marital_status" required>
                    <option value=""> --Select-- </option>
                    <option value="Married">Married</option>
                    <option value="Single">Single</option>
                    <option value="Divorce">Divorce</option>
                    <option value="Widow">Widow</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col">
                <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                <input type="date" name="dob" class="form-control" placeholder="Date of Birth" required />
              </div>
            </div>

            <div class="row mb-3">
              <div class="col">
                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" required />
              </div>
              <div class="col">
                <label class="form-label">Phone No. <span class="text-danger">*</span></label>
                <input type="text" name="phone" class="form-control" required />
              </div>
            </div>

            <div class="row mb-3">
              <div class="col">
                <label class="form-label">Nationality. <span class="text-danger">*</span></label>
                <select class="form-control" name="nationality" required>
                  <option value="">--Select--</option>
                  <option value="nigerian">Nigerian</option>
                  <option value="non-nigerian">Non-Nigerian</option>
                </select>
              </div>
              <div class="col">
                <label class="form-label">National Identity No. (NIN) <span class="text-danger">*</span></label>
                <input type="text" name="nin" class="form-control" required />
              </div>
            </div>

            <div class="row mb-3">
              <div class="col">
                <label class="form-label"> State Of Origin <span class="text-danger">*</span></label>
                <select class="form-control" name="state" id="state" required>
                  <option value="">--Select--</option>
                  <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($s->id); ?>"><?php echo e($s->state); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="col">
                <label class="form-label"> Local Government <span class="text-danger">*</span></label>
                <select class="form-control" name="lga" id="lga" required>
                  <option value="">--Select--</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col">
                <label class="form-label">Home Address <span class="text-danger">*</span></label>
                <input type="text" name="address" class="form-control" required />
              </div>
              <div class="col">
                <label class="form-label">Disability <span class="text-danger">*</span></label>
                <input type="text" name="disability" class="form-control" required />
              </div>
            </div>

            <div class="row mb-3">
              <div class="col">
                <label class="form-label">Cadre <span class="text-danger">*</span></label>
                <select class="form-control" name="cadre" id="cadre" required>
                  <option value="">--Select--</option>
                  <?php $__currentLoopData = $cadres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($c->id); ?>"><?php echo e($c->cadre); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="col">
                <label class="form-label">Rank <span class="text-danger">*</span></label>
                <select class="form-control" name="rank" id="rank" required>
                    <option value="">--Select--</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col">
                <label class="form-label">Grade Level <span class="text-danger">*</span></label>
                <input type="text" name="grade_level" class="form-control" required />
              </div>
              <div class="col">
                <label class="form-label">Step <span class="text-danger">*</span></label>
                <input type="text" name="step" class="form-control" required />
              </div>
            </div>            

            <div class="row mb-3">
              <div class="col">
                <label class="form-label">Date of first appointment (DOFA) <span class="text-danger">*</span></label>
                <input type="date" name="dofa" class="form-control" required />
              </div>
              <div class="col">
                <label class="form-label">Date of present appointment (DOPA) <span class="text-danger">*</span></label>
                <input type="date" name="dopa" class="form-control" required />
              </div>
            </div>

            <div class="row mb-3">
              <div class="col">
                <label class="form-label">Duty station <span class="text-danger">*</span></label>
                <select class="form-control" name="duty_station" required>
                    <option value="">--Select--</option>
                    <option value="BS-PCAC">BS-PCAC</option>
                </select>
              </div>
              <div class="col">
                <label class="form-label">Nature of Employment <span class="text-danger">*</span></label>
                <select class="form-control" name="nature" required>
                  <option value="">--Select--</option>
                  <?php $__currentLoopData = $natures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($n->id); ?>"><?php echo e($n->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col">
                <label class="form-label">Bank Name <span class="text-danger">*</span></label>
                <select name="bank_name" class="form-control" required>
                  <option value="">--Select--</option>
                  <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($bank->id); ?>"><?php echo e($bank->bank_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="col">
                <label class="form-label">Account No. <span class="text-danger">*</span></label>
                <input type="text" name="account_no" class="form-control" required />
              </div>
            </div>

            <div class="row mb-3">
              <div class="col">
                <label class="form-label">Bank Verification No. (BVN) <span class="text-danger">*</span></label>
                <input type="text" name="bvn" class="form-control" required />
              </div>
              <div class="col">
                <label class="form-label">Passport Photograph</label>
                <input type="file" name="image" class="form-control" />
              </div>
            </div>

            <div class="row mb-3">
              <div class="col">

              </div>
              <div class="col">

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
    $(document).ready(function() {
        $('#state').on('change', function () {
            var id = $('#state').val();
            $('#lga').empty();
            $('#lga').append(`<option value="" disabled selected>Processing...</option>`);
            $.ajax({
                type: 'GET',
                url: '../../get_local/' + id,
                success: function (response) {
                    var response = JSON.parse(response);
                    //console.log(response);
                    $('#lga').empty();
                    $('#lga').append(`<option value="" disabled selected>--Select--</option>`);
                    response.forEach(element => {
                        $('#lga').append(`<option value="${element['id']}">${element['lga']}</option>`);
                    });
                }
            });
        });
        $('#cadre').on('change', function () {
            var id = $('#cadre').val();
            $('#rank').empty();
            $('#rank').append(`<option value="" disabled selected>Processing...</option>`);
            $.ajax({
                type: 'GET',
                url: '../../get_rank/' + id,
                success: function (response) {
                    var response = JSON.parse(response);
                    //console.log(response);
                    $('#rank').empty();
                    $('#rank').append(`<option value="" disabled selected>--Select--</option>`);
                    response.forEach(element => {
                        $('#rank').append(`<option value="${element['id']}">${element['rank']} - GL${element['grade_level']}</option>`);
                    });
                }
            });
        });
    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Repository\bs-pcac\resources\views/employee/index.blade.php ENDPATH**/ ?>