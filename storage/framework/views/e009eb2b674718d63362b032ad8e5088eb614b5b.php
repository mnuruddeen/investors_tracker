<nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
    <div class="container">
        <a href="<?php echo e(url('/')); ?>" class="navbar-brand">
            <img src="<?php echo e(asset('main/img/logo.png')); ?>">
        </a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo e(url('/')); ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('about-us')); ?>">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('services')); ?>">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('contact-us')); ?>">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-2" href="<?php echo e(url('login')); ?>">Login</a>
            </li>
          </ul>
        </div>

    </div>
</nav>

<?php /**PATH C:\Users\Administrator\Desktop\Repository\CofOs\resources\views/inc/main_navbar.blade.php ENDPATH**/ ?>