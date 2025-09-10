

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
          Add Schedule   
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
                      <th width="45%">Course Title</th>
                      <th width="15%">No. Questions</th>
                      <th width="10%">Duration</th>
                      <th width="10%">Status</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;
                    ?>
                    <?php if(count($schedules) > 0): ?>
                      <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($count++); ?></td>
                        <td><?php echo e(strtoupper($s->course->code)); ?> - <?php echo e(strtoupper($s->course->title)); ?></td>
                        <td><?php echo e(strtoupper($s->no_question)); ?></td>
                        <td><?php echo e(strtoupper($s->duration)); ?></td>
                        <td><?php echo ($s->status) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>'; ?></td>
                        <td>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#edit_modal<?php echo e($s->id); ?>">
                            <span class="tf-icons bx bx-pencil"></span>
                          </a>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal<?php echo e($s->id); ?>">
                            <span class="tf-icons bx bx-trash"></span>
                          </a>
                          <!-- Edit modal -->
                          <div class="modal fade" id="edit_modal<?php echo e($s->id); ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel1">Edit <?php echo e($title); ?></h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <form action="<?php echo e(url('schedules/'.$s->id)); ?>" method="post">
                                  <?php echo csrf_field(); ?>
                                  <?php echo method_field('PUT'); ?>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Course Title</label>
                                        <select class="form-control w-100" name="course" id="course" required>
                                          <option value=""> --Select-- </option>
                                          <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($course->id); ?>" <?php if($s->course->id == $course->id): ?><?php echo e("selected"); ?><?php endif; ?>><?php echo e($course->code); ?> - <?php echo e($course->title); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">No of Questions</label>
                                        <input type="number" name="no_of_questions" id="nameBasic" class="form-control" placeholder="No of Questions" value="<?php echo e($s->no_question); ?>" required />
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Mark for each Question</label>
                                        <input type="number" name="mark" id="nameBasic" class="form-control" placeholder="No. Mark" value="<?php echo e($s->total_mark); ?>" required />
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Duration (<span class="text-info">in Minute</span>)</label>
                                        <input type="number" name="duration" id="nameBasic" class="form-control" placeholder="Duration" value="<?php echo e($s->duration); ?>" required />
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Date </label>
                                        <input type="date" name="date" id="nameBasic" class="form-control" value="<?php echo e($s->exam_date); ?>" required />
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Level</label>
                                        <select name="level" class="form-control" required>
                                          <option value="">--Select--</option>
                                          <option value="ND 1" <?php echo e(($s->level =="ND 1") ? 'selected': ''); ?>>ND 1</option>
                                          <option value="ND 2" <?php echo e(($s->level =="ND 2") ? 'selected': ''); ?>>ND 2</option>
                                          <option value="HND 1" <?php echo e(($s->level =="HND 1") ? 'selected': ''); ?>>HND 1</option>
                                          <option value="HND 2" <?php echo e(($s->level =="HND 2") ? 'selected': ''); ?>>HND 2</option>
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
                          <!-- Delete -->
                          <div class="modal fade" id="delete_modal<?php echo e($s->id); ?>" tabindex="-1" aria-hidden="true">
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
                                    <a href="<?php echo e(url('schedules/'.encrypt($s->id).'/delete')); ?>" class="btn rounded-pill btn-primary">Delete</a>
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
          <h5 class="modal-title" id="exampleModalLabel1">Add Schedule</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form action="<?php echo e(url('/schedules')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Course Title</label>
                <select class="form-control w-100" name="course" id="course" required>
                  <option value=""> --Select-- </option>
                  <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($course->id); ?>"><?php echo e($course->code); ?> - <?php echo e($course->title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col mb-3">
                <label class="form-label">No of Questions</label>
                <input type="number" name="no_of_questions" id="nameBasic" class="form-control" placeholder="No of Questions" required />
              </div>
            </div>

            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Mark for each Question</label>
                <input type="number" name="mark" id="nameBasic" class="form-control" placeholder="No. Mark" required />
              </div>
            </div>

            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Duration (<span class="text-info">in Minute</span>)</label>
                <input type="number" name="duration" id="nameBasic" class="form-control" placeholder="Duration" required />
              </div>
            </div>

            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Date </label>
                <input type="date" name="date" id="nameBasic" class="form-control" required />
              </div>
            </div>

            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Level</label>
                <select name="level" class="form-control" required>
                  <option value="">--Select--</option>
                  <option value="ND 1">ND 1</option>
                  <option value="ND 2">ND 2</option>
                  <option value="HND 1">HND 1</option>
                  <option value="HND 2">HND 2</option>
                </select>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-success">Add Schedule</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Repository\cbt\resources\views/schedule/index.blade.php ENDPATH**/ ?>