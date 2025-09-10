<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <span class="app-brand-logo demo">
        <a href="<?php echo e(url('/home')); ?>" class="app-brand-link gap-2">
            <img src="<?php echo e(url('assets/img/logo.png')); ?>" height="50" width="50">
        </a>
      </span>
      <span class="app-brand-text menu-text fw-bolder ms-2">CofOs</span>
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
        <i class="menu-icon tf-icons bx bx-world"></i>
        <div data-i18n="Website">Website</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="<?php echo e(url('/abouts')); ?>" class="menu-link">
            <div data-i18n="Abouts">Abouts</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="<?php echo e(url('/sliders')); ?>" class="menu-link">
            <div data-i18n="Sliders">Sliders</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="<?php echo e(url('/services')); ?>" class="menu-link">
            <div data-i18n="Services">Services</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="<?php echo e(url('/galleries')); ?>" class="menu-link">
            <div data-i18n="Galleries">Galleries</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="<?php echo e(url('/partners')); ?>" class="menu-link">
            <div data-i18n="Partners">Partners</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="<?php echo e(url('/teams')); ?>" class="menu-link">
            <div data-i18n="Teams">Teams</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item">
      <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-copy"></i>
        <div data-i18n="Reports">CofOs Config</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="<?php echo e(url('owner_types')); ?>" class="menu-link">
            <div data-i18n="">Owner Types</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="<?php echo e(url('ownership_types')); ?>" class="menu-link">
            <div data-i18n="">Ownership Types</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-news"></i>
        <div data-i18n="Misc">CofOs</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="<?php echo e(url('certificates/create')); ?>" class="menu-link">
            <div data-i18n="CofOs Entry">CofOs Entry</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="<?php echo e(url('certificates')); ?>" class="menu-link">
            <div data-i18n="Manage CofOs">Manage CofOs</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item">
      <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <div data-i18n="Reports">CofOs Reports</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="<?php echo e(url('#')); ?>" class="menu-link">
            <div data-i18n="">Report 1</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="<?php echo e(url('#')); ?>" class="menu-link">
            <div data-i18n="">Report 2</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="<?php echo e(url('#')); ?>" class="menu-link">
            <div data-i18n="">Report 3</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Users">System Users</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="<?php echo e(url('users')); ?>" class="menu-link">
            <div data-i18n="View users">View users</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-key"></i>
        <div data-i18n="Users">Access Control</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="<?php echo e(url('roles')); ?>" class="menu-link">
            <div data-i18n="Roles">Roles</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="<?php echo e(url('permissions')); ?>" class="menu-link">
            <div data-i18n="Permissions">Permissions</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item">
      <a href="<?php echo e(url('/change-password')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-lock"></i>
        <div data-i18n="Change password">Change password</div>
      </a>
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
<?php /**PATH C:\Users\mukht\Desktop\New Projects\CofOs\resources\views/inc/sidebar.blade.php ENDPATH**/ ?>