

<?php $__env->startSection('content'); ?>
  
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <!-- Breadcrumb -->
      <div class="container d-flex justify-content-between flex-md-row">
        <div>
          <h5 class="py-3 mb-3 small"><span class="text-muted fw-light"><a href="<?php echo e(url('/home')); ?>">Dashboard</a> / <a href="<?php echo e(url('/cases')); ?>">Cases</a> / </span> <?php echo e($title); ?></h5>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update case')): ?>
        <div class="text-right">
          <button type="button" class="btn rounded-pill btn-primary" data-bs-toggle="modal" data-bs-target="#edit_modal">
          Edit Case   
          </button>
        </div>
        <?php endif; ?>
      </div>
      <!-- Breadcrumb -->

      <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <div class="row">
        <div class="col-xl">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link active"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-pills-justified-personal"
                          aria-controls="navs-pills-justified-personal"
                          aria-selected="true"
                        >
                          <i class="tf-icons bx bx-user"></i> Case Details
                        </button>
                      </li>
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-pills-justified-document"
                          aria-controls="navs-pills-justified-document"
                          aria-selected="false"
                        >
                          <i class="tf-icons bx bx-file"></i> Case Documents
                        </button>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <!-- Case details start -->
                      <div class="tab-pane fade show active" id="navs-pills-justified-personal" role="tabpanel">
                        
                      </div>
                      <!-- Case details end -->

                      <!-- Documents start -->
                      <div class="tab-pane fade" id="navs-pills-justified-document" role="tabpanel">
                        <div class="text-end mb-3">
                          <button type="button" class="btn rounded-pill btn-success" data-bs-toggle="modal" data-bs-target="#add_document">
                          Upload Document   
                          </button>
                        </div>
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered small">
                            <thead>
                              <tr>
                                <th width="5%">S/N</th>
                                <th width="80%">DOCUMENT</th>
                                <th width="15%">ACTION</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 1;
                            ?>
                            <?php if(count($documents) > 0): ?>
                              <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td><?php echo e($count++); ?></td>
                                <td>
                                  <a href="<?php echo e(asset('assets/documents/cases/'.$document->document)); ?>"> 
                                    <?php echo e(strtoupper($document->name)); ?>

                                  </a>
                                </td>
                                <td>
                                  <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal<?php echo e($document->id); ?>">
                                    <span class="tf-icons bx bx-trash"></span>
                                  </a>
                                  <!-- Delete -->
                                  <div class="modal fade" id="delete_modal<?php echo e($document->id); ?>" tabindex="-1" aria-hidden="true">
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
                                            <a href="<?php echo e(url('documents/'.encrypt($document->id).'/delete')); ?>" class="btn rounded-pill btn-primary">Delete</a>
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
                              <td colspan="3">
                                <p class="alert alert-danger text-center">No record found!</p>
                              </td>
                            </tr>
                            <?php endif; ?>
                            
                          </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- Documents end -->
                    </div>
                  </div>
                </div>
                </div>
              </div>
              <!-- Pills -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->

    <!-- Document Modal -->
    <div class="modal fade" id="add_document" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Upload Document</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <form action="<?php echo e(url('/documents')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12 mb-3">
                  <input type="hidden" name="employee_id" value="<?php echo e(encrypt($case->id)); ?>">
                  <label class="form-label">Document Type <span class="text-danger">*</span></label>
                  <select name="document_type" class="form-control" required>
                    <option value="">--Select type--</option>
                    <option value="Curriculum Vitea">Curriculum Vitea (CV)</option>
                    <option value="Professional Certificate">Professional Certificate</option>
                    <option value="Other Document">Other Document</option>
                  </select>
                </div>

                <div class="col-md-12 mb-3">
                  <label class="form-label">Document <span class="text-danger">*</span></label>
                  <input type="file" name="document" class="form-control" required accept="application/pdf" />
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
    <!-- //End Document Modal -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Repository\bs-pcac\resources\views/case/show.blade.php ENDPATH**/ ?>