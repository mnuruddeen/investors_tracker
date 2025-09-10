<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <span class="app-brand-logo demo">
        <a href="<?php echo e(url('/home')); ?>" class="app-brand-link gap-2">
            <img src="<?php echo e(url('assets/img/logo.png')); ?>" height="40" width="30">
        </a>
      </span>
      <span class="app-brand-text menu-text fw-bolder ms-2">CBT</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item active">
      <a href="<?php echo e(url('/home')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Configurations">Configurations</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="<?php echo e(url('/schools')); ?>" class="menu-link">
            <div data-i18n="Schools">Schools</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="<?php echo e(url('/departments')); ?>" class="menu-link">
            <div data-i18n="Departments">Departments</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="<?php echo e(url('/programs')); ?>" class="menu-link">
            <div data-i18n="Programs">Programs</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="<?php echo e(url('/courses')); ?>" class="menu-link">
            <div data-i18n="Courses">Courses</div>
          </a>
        </li>
      </ul>
    </li>
    
    <li class="menu-item">
      <a href="<?php echo e(url('questions')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-collection"></i>
        <div data-i18n="Basic">Questions</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cube-alt"></i>
        <div data-i18n="Misc">Schedule</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="<?php echo e(url('schedules')); ?>" class="menu-link">
            <div data-i18n="Schedules">Schedules</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="<?php echo e(url('exam_schedules')); ?>" class="menu-link">
            <div data-i18n="Under Maintenance">Exam Schedules</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Students">Students</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="<?php echo e(url('students')); ?>" class="menu-link">
            <div data-i18n="View students">View students</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Extended components -->
    <li class="menu-item">
      <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-copy"></i>
        <div data-i18n="Bulk Operations">Bulk Operations</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="<?php echo e(url('import_students')); ?>" class="menu-link">
            <div data-i18n="Import Students">Import Students</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="<?php echo e(url('import_questions')); ?>" class="menu-link">
            <div data-i18n="Import Questions">Import Questions</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item">
      <a class="menu-link" href="<?php echo e(route('logout')); ?>"
           onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
        <i class="menu-icon tf-icons bx bx-power-off"></i>
        <div data-i18n="Logout">Logout</div>
      </a>
      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
        <?php echo csrf_field(); ?>
        </form>
    </li>
  </ul>
</aside>
<?php /**PATH C:\Users\HP\Desktop\Repository\cbt\resources\views/inc/sidebar.blade.php ENDPATH**/ ?>