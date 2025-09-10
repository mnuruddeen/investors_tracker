
<?php $__env->startSection('content'); ?>

<!-- Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="mt-2 mb-2 text-end">
                <a href="javascript:history.go(-1)" class="btn btn-primary btn-sm d-print-none">Go Back <i class="bx bx-arrow-back"></i></a>
                <button onclick="window.print()" class="btn btn-info btn-sm ml-3 d-print-none">Print Now <i class="bx bx-printer"></i></button>
            </div>
            <table width="100%" border="0" cellpadding="5" class="table-striped table-bordered mb-5 small">
                <thead>
                    <tr>
                      <th width="5%">S/N</th>
                      <th width="15%">PSN</th>
                      <th width="40%">FULLNAME</th>
                      <th width="15%">BANK NAME</th>
                      <th width="15%">ACCOUNT No</th>
                      <th width="10%">AMOUNT</th>
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
                        <?php echo e(strtoupper($employee->full_name)); ?>

                    </td>
                    <td><?php echo e(strtoupper($employee->bank->bank_name)); ?></td>
                    <td><?php echo e(strtoupper($employee->account_no)); ?></td>
                    <td></td>
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
<!-- /Page Content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Repository\bs-pcac\resources\views/report/bank_detail.blade.php ENDPATH**/ ?>