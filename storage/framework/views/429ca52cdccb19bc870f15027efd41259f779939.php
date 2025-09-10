

<?php $__env->startSection('content'); ?>
  
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <!-- Breadcrumb -->
      <div class="container d-flex justify-content-between flex-md-row">
        <div>
          <h5 class="py-3 mb-3 small"><span class="text-muted fw-light"><a href="<?php echo e(url('/home')); ?>">Dashboard</a> / </span> <?php echo e($title); ?></h5>
        </div>
        <div class="text-right">
          <a href="<?php echo e(url('certificates/create')); ?>" class="btn rounded-pill btn-primary">
          Add Certificate   
          </a>
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
                      <th width="15%">Owner Type</th>
                      <th width="15%">Owners Name</th>
                      <th width="10%">Ownership Type</th>
                      <th width="10%">Issuance Date</th>
                      <th width="10%">Registration Date</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;
                    ?>
                    <?php if(count($certificates) > 0): ?>
                      <?php $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cofos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($count++); ?></td>
                        <td><?php echo e($cofos->owner_type->name); ?></td>
                        <td><?php echo e(strtoupper($cofos->owner_name)); ?></td>
                        <td><?php echo e($cofos->ownership_type->name); ?></td>
                        <td><?php echo e(date('d-m-Y',strtotime($cofos->date_of_issuance))); ?></td>
                        <td><?php echo e(date('d-m-Y',strtotime($cofos->date_of_registration))); ?></td>
                        <td>
                          <?php if($cofos->document): ?>

                            <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-secondary" data-bs-toggle="modal" data-bs-target="#view_document_modal<?php echo e($cofos->id); ?>">
                              <span class="tf-icons bx bx-file"></span>
                            </a>
                            <div class="modal fade" id="view_document_modal<?php echo e($cofos->id); ?>" tabindex="-1" aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header text-center d-inline">
                                    <h5 class="modal-title">Supporting Documents</h5>
                                  </div>
                                  
                                  <div class="text-center pt-2 pb-4">
                                    
                                      <iframe src="<?php echo e(asset('main/certificates/'.$cofos->document)); ?>" width="100%" height="100%" style="border: none;">
                                        <img src="<?php echo e(asset('main/certificates/'.$cofos->document)); ?>" class="img-fluid" height="100%" width="100%">
                                          Your browser does not support iframes.
                                      </iframe>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                          <?php endif; ?>
                          <a href="<?php echo e(url('certificates/'.encrypt($cofos->id).'/edit')); ?>" class="btn btn-xs p-3 rounded-pill btn-icon btn-primary">
                            <span class="tf-icons bx bx-pencil"></span>
                          </a>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal<?php echo e($cofos->id); ?>">
                            <span class="tf-icons bx bx-trash"></span>
                          </a>
                          <!-- Delete -->
                          <div class="modal fade" id="delete_modal<?php echo e($cofos->id); ?>" tabindex="-1" aria-hidden="true">
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
                                    <a href="<?php echo e(url('certificates/'.encrypt($cofos->id).'/delete')); ?>" class="btn rounded-pill btn-primary">Delete</a>
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
                      <td colspan="7">
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

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mukht\Desktop\New Projects\CofOs\resources\views/certificate/index.blade.php ENDPATH**/ ?>