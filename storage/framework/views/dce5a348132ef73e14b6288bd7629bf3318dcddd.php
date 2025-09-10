
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
        <div class="card-body">
	        <form action="<?php echo e(url('/certificates')); ?>" method="post" enctype="multipart/form-data">
	        <?php echo csrf_field(); ?>
		        <div class="form-group mb-4">
		        	<label>Date of Recording: <span class="text-danger">*</span></label>
		        	<input type="date" name="date_of_recording" class="form-control" required>
		        </div>

		        <div class="form-group mb-4">
		        	<label>Owner Type: <span class="text-danger">*</span></label>
		        	<select name="owner_type" class="form-control" required>
		        		<option value="">--Choose Owner Type--</option>
		        		<?php $__currentLoopData = $owner_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $owner_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        			<option value="<?php echo e($owner_type->id); ?>"><?php echo e(strtoupper($owner_type->name)); ?></option>
		        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		        	</select>
		        </div>

		        <div class="form-group mb-4">
		        	<label>Owner(s) Name: <span class="text-danger">*</span></label>
		        	<input type="text" name="owner_name" class="form-control" required>
		        </div>

		        <div class="form-group mb-4">
		        	<label>Owner Gender: <span class="text-danger">*</span></label>
		        	<select name="owner_gender" id="owner_gender" class="form-control" required>
		        		<option value="">--Choose Gender--</option>
		        		<option value="Male">Male</option>
		        		<option value="Female">Female</option>
		        		<option value="Others">Others</option>
		        	</select>
		        </div>

		        <div class="form-group mb-4" id="specify">
		        	<label>Specify: <span class="text-danger">*</span></label>
		        	<input type="text" name="specify" class="form-control">
		        </div>

		        <div class="form-group mb-4">
		        	<label>Ownership Type: <span class="text-danger">*</span></label>
		        	<select name="ownership_type" class="form-control" required>
		        		<option value="">--Choose Ownership Type--</option>
		        		<?php $__currentLoopData = $ownership_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ownership_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        			<option value="<?php echo e($ownership_type->id); ?>"><?php echo e(strtoupper($ownership_type->name)); ?></option>
		        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		        	</select>
		        </div>

		        <div class="form-group mb-4">
		        	<label>CofO Issuance date: <span class="text-danger">*</span></label>
		        	<input type="date" name="date_of_issuance" class="form-control" required>
		        </div>

		        <div class="form-group mb-4">
		        	<label>CofO Registration date: <span class="text-danger">*</span></label>
		        	<input type="date" name="date_of_registration" class="form-control" required>
		        </div>

		        <div class="form-group mb-4">
		        	<label>CofO Reference number: <span class="text-danger">*</span></label>
		        	<input type="text" name="reference_no" class="form-control" required>
		        </div>

		        <div class="form-group mb-4">
		        	<label>CofO/Documents Picture: <span class="text-danger">*</span></label>
		        	<input type="file" name="document" class="form-control" accept="image/*" required>
		        </div>

		        <div class="form-group mb-4">
		        	<label>Enumerator Name: <span class="text-danger">*</span></label>
		        	<input type="text" name="enumerator_name" value="<?php echo e(strtoupper(auth()->user()->name)); ?>" class="form-control disabled"  readonly disabled>
		        </div>

		        <div class="form-group mb-4 text-center">
		        	<button type="submit" class="btn rounded-pill btn-primary">Submit</button>
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
  			let specify = $('#specify');
  			specify.hide();
        $('#owner_gender').on('change', function () {
            var owner_gender = $('#owner_gender').val();
            
            if(owner_gender == 'Others'){
            	specify.show();
            }else {
            	specify.hide();
            }
        });
        
    });
  </script>
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Desktop\Repository\CofOs\resources\views/certificate/create.blade.php ENDPATH**/ ?>