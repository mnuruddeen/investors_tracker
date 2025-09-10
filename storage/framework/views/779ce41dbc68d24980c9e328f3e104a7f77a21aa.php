
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
	        <form action="<?php echo e(url('news/'.$news->id)); ?>" method="post" enctype="multipart/form-data">
	        <?php echo csrf_field(); ?>
	        <?php echo method_field('PUT'); ?>
		        <div class="form-group mb-4">
		        	<label>Title <span class="text-danger">*</span></label>
		        	<input type="text" name="title" value="<?php echo e($news->title); ?>" class="form-control" required>
		        </div>

		        <div class="form-group mb-4">
		        	<label>Category <span class="text-danger">*</span></label>
		        	<select name="category" class="form-control" required>
		        		<option value="">--Choose category--</option>
		        		<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        			<option value="<?php echo e($cat->id); ?>" <?php echo e(($news->category_id == $cat->id) ? 'selected' : ''); ?>><?php echo e(strtoupper($cat->name)); ?></option>
		        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		        	</select>
		        </div>

		        <div class="form-group mb-4">
		        	<label>Body <span class="text-danger">*</span></label>
		        	<textarea name="body" id="body" class="form-control" rows="5" required><?php echo e($news->body); ?></textarea>
		        </div>

		        <div class="form-group mb-4">
		        	<label>Cover Image</label>
		        	<input type="file" name="document" class="form-control" accept="image/*">
		        </div>

		        <div class="form-group mb-4 text-center">
		        	<button type="submit" class="btn rounded-pill btn-primary">Publish</button>
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
  <script src="<?php echo e(asset('assets/js/ckeditor.js')); ?>"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#body' ) )
    .catch( error => {
    console.error( error );
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Repository\bs-pcac\resources\views/news/edit.blade.php ENDPATH**/ ?>