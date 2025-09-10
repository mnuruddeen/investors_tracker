

<?php $__env->startSection('content'); ?>
  
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <!-- Breadcrumb -->
      <div class="container d-flex justify-content-between flex-md-row">
        <div>
          <h5 class="py-3 mb-3 small"><span class="text-muted fw-light"><a href="<?php echo e(url('/questions')); ?>">Courses</a> / </span> <?php echo e($title); ?></h5>
        </div>
        <div class="text-right">
          <button type="button" class="btn rounded-pill btn-primary" data-bs-toggle="modal" data-bs-target="#add_modal">
          Add Question   
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
                      <th width="45%">Question</th>
                      <th width="15%">Correct Answer</th>
                      <th width="10%">Status</th>
                      <th width="10%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;
                    ?>
                    <?php if(count($questions) > 0): ?>
                      <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($count++); ?></td>
                        <td><?php echo e($q->question); ?></td>                        
                        <td><?php echo e($q->correct_option); ?></td>
                        <td><?php echo ($q->status) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>'; ?></td>
                        <td>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal<?php echo e($q->id); ?>">
                            <span class="tf-icons bx bx-trash"></span>
                          </a>
                          <!-- Delete -->
                          <div class="modal fade" id="delete_modal<?php echo e($q->id); ?>" tabindex="-1" aria-hidden="true">
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
                                    <a href="<?php echo e(url('questions/'.encrypt($q->id).'/delete')); ?>" class="btn rounded-pill btn-primary">Delete</a>
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
          <h5 class="modal-title" id="exampleModalLabel1">Add Question</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form action="<?php echo e(url('/questions')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Course Title</label>
                <input type="text" name="course" id="nameBasic" class="form-control" value="<?php echo e(strtoupper($title)); ?>" readonly />
                <input type="hidden" name="course_id" value="<?php echo e(encrypt($course->id)); ?>">
              </div>
            </div>

            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Question</label>
                <input type="text" name="question" id="nameBasic" class="form-control" placeholder="Enter your question here" required />
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Option 1 <span class="text-danger">*</span></label>
                <input type="text" name="option_1" id="nameBasic" class="form-control" required />
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Option 2 <span class="text-danger">*</span></label>
                <input type="text" name="option_2" id="nameBasic" class="form-control" required />
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Option 3</label>
                <input type="text" name="option_3" id="nameBasic" class="form-control" />
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Option 4</label>
                <input type="text" name="option_4" id="nameBasic" class="form-control" />
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Correct Answer</label>
                <input type="text" name="correct_answer" id="nameBasic" class="form-control" required />
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-success">Add Question</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Repository\cbt\resources\views/question/show.blade.php ENDPATH**/ ?>