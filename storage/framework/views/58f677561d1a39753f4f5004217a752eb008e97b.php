
<?php $__env->startSection('content'); ?>

  <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">About Us</h5>
                        <h1 class="display-6 mb-0"><?php echo e(config('app.name')); ?></h1>
                    </div>
                    
                    <p class="mb-4 text-justify">The Bauchi State Ministry of Information started as a department under the Governor’s office when the State was created out of the North Eastern State. It was later to be given a full status of a Ministry First as Ministry of Home Affairs, Information, Youth and Sports and Social Development.
                    </p>
                    <p class="text-justify">
                        During the years it had gone through several transformations until recently when this administration transformed it from the Ministry of Information, Culture and Tourism to the present status as the Ministry of Information and Communication.
                    </p>

                    <p class="text-justify">
                        The Ministry of Information is the image-maker of the State Government. It is responsible for the information dissemination on the activities and policies of the Government. By so doing, it also provide, the feedback on the Government’s activities and programmes to the Government on  the effects or otherwise  of the policies being implemented, etc
                    </p>
                </div>

                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="<?php echo e(asset('main/img/badge.png')); ?>" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Main Objectives Start -->
    <div class="container-fluid bg-primary bg-appointment my-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-12 py-5">
                    <div class="py-2">
                        <h1 class="display-5 text-white mb-4 text-center">MAIN OBJECTIVE</h1>
                        <p class="text-white mb-2">Main objective of the Ministry is to facilitate, through effective information dissemination, the attainment of the vision and mission of the government.</p>
                        <h5 class="mb-2 text-white">The objective is achieved through the following;-</h5>
                        <p class="mb-2 text-light"><i class="fa fa-check-circle text-primary me-3"></i> Sensitizations of the public on various programmes of government through various medium.</p>

                        <p class="mb-2 text-light"><i class="fa fa-check-circle text-primary me-3"></i> Fostering unity among the various people of the state</p>

                        <p class="mb-2 text-light"><i class="fa fa-check-circle text-primary me-3"></i> Ensuring a free articulated but responsible media that respect the state and national interest.</p>

                        <p class="mb-2 text-light"><i class="fa fa-check-circle text-primary me-3"></i> Building of confidence and self-reliance in the people effective communication and information dissemination.</p>

                        <p class="mb-2 text-light"><i class="fa fa-check-circle text-primary me-3"></i> Enlightenment and educating the citizenry towards participation in the democratic process.</p>

                        <p class="mb-2 text-light"><i class="fa fa-check-circle text-primary me-3"></i> Updating the technology of the media in the state to meet the present day challenges. </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Objectives End -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Desktop\Repository\CofOs\resources\views/pages/about.blade.php ENDPATH**/ ?>