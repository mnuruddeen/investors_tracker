
<?php $__env->startSection('content'); ?>

<!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <!-- Breadcrumb -->
      <div class="container d-flex justify-content-between flex-md-row">
        <div>
          <h5 class="py-3 mb-3 small"><span class="text-muted fw-light"><a href="<?php echo e(url('/home')); ?>">Dashboard</a> / </span> <?php echo e($title); ?></h5>
        </div>
        <div class="text-right">
          <a href="<?php echo e(url('import_students')); ?>" class="btn rounded-pill btn-primary">
          Import New students   
          </a>
        </div>
      </div>
      <!-- Breadcrumb -->
      
      <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <div class="row">
        <div class="col-xl">
          <div class="card mb-4">
            <div class="card-body">
            <form  action="<?php echo e(url('students')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Schools <span class="text-danger">*</span></label>
                            <select class="form-control w-100" name="school" id="school" required>
                                <option value=""> --Select-- </option>
                                <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($school->id); ?>"><?php echo e($school->school); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Department <span class="text-danger">*</span></label>
                        <select class="form-control w-100" name="department" id="department" required>
                            <option value=""> --Select-- </option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Program <span class="text-danger">*</span></label>
                            <select class="form-control w-100" name="program" id="program" required>
                              <option value=""> --Select-- </option>
                              
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Level <span class="text-danger">*</span></label>
                        <select class="form-control w-100" name="level" id="level" required>
                            <option value=""> --Select-- </option>
                            <option value="ND 1">ND 1</option>
                            <option value="ND 2">ND 2</option>
                            <option value="HND 1">HND 1</option>
                            <option value="HND 2">HND 2</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl text-center mt-4">
                    <input type="submit" class="btn rounded-pill btn-primary" value="View students">
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

      //Department change
      $('#department').on('change', function () {
        var id = $('#department').val();
        $('#program').empty();
        $('#program').append(`<option value="" disabled selected>Processing...</option>`);
        $.ajax({
            type: 'GET',
            url: '../../get_program/' + id,
            success: function (response) {
              var response = JSON.parse(response);
              //console.log(response);
              $('#program').empty();
              $('#program').append(`<option value="" disabled selected>--Select--</option>`);
              response.forEach(element => {
                  $('#program').append(`<option value="${element['id']}">${element['program']}</option>`);
              });
            }
        });
      });

    });

  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Repository\cbt\resources\views/user/student.blade.php ENDPATH**/ ?>