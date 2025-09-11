<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
      <div class="sidebar-header">
          <div class="d-flex justify-content-between">
              <div class="logo">
                  <a href="{{ url('/home') }}"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
              </div>
              <div class="toggler">
                  <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
              </div>
          </div>
      </div>
      <div class="sidebar-menu">
          <ul class="menu">
              <li class="sidebar-title">Menu</li>

              <li class="sidebar-item active ">
                  <a href="{{ url('/home') }}" class='sidebar-link'>
                      <i class="bi bi-grid-fill"></i>
                      <span>Dashboard</span>
                  </a>
              </li>

              <li class="sidebar-item  has-sub">
                  <a href="#" class='sidebar-link'>
                      <i class="bi bi-stack"></i>
                      <span>Website</span>
                  </a>
                  <ul class="submenu ">
                      <li class="submenu-item ">
                          <a href="{{ url('/abouts') }}">About</a>
                      </li>
                      <li class="submenu-item ">
                          <a href="{{ url('/sliders') }}">Sliders</a>
                      </li>
                      <li class="submenu-item ">
                          <a href="{{ url('/services') }}">Services</a>
                      </li>
                      <li class="submenu-item ">
                          <a href="{{ url('/galleries') }}">Galleries</a>
                      </li>
                      <li class="submenu-item ">
                          <a href="{{ url('/partners') }}">Partners</a>
                      </li>
                      <li class="submenu-item ">
                          <a href="{{ url('/teams') }}">Teams</a>
                      </li>
                  </ul>
              </li>

              <li class="sidebar-item  has-sub">
                  <a href="#" class='sidebar-link'>
                      <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                      <span>Reports</span>
                  </a>
                  <ul class="submenu ">
                      <li class="submenu-item ">
                          <a href="{{ url('#') }}">Report 1</a>
                      </li>
                      <li class="submenu-item ">
                          <a href="{{ url('#') }}">Report 2</a>
                      </li>
                      <li class="submenu-item ">
                          <a href="{{ url('#') }}">Report 3</a>
                      </li>
                  </ul>
              </li>

              <li class="sidebar-item  has-sub">
                  <a href="#" class='sidebar-link'>
                      <i class="bi bi-shield"></i>
                      <span>Access Controls</span>
                  </a>
                  <ul class="submenu ">
                      <li class="submenu-item ">
                          <a href="{{ url('roles') }}">Roles</a>
                      </li>
                      <li class="submenu-item ">
                          <a href="{{ url('permissions') }}">Permissions</a>
                      </li>
                  </ul>
              </li>

              <li class="sidebar-item  has-sub">
                  <a href="#" class='sidebar-link'>
                      <i class="bi bi-person-badge-fill"></i>
                      <span>Users</span>
                  </a>
                  <ul class="submenu ">
                      <li class="submenu-item ">
                          <a href="{{ url('users') }}">Users</a>
                      </li>
                  </ul>
              </li>

              <li class="sidebar-item">
                  <a href="{{ url('change-password') }}" class='sidebar-link'>
                      <i class="bi bi-puzzle"></i>
                      <span>Change Password</span>
                  </a>
              </li>

              <li class="sidebar-item">
                  <a href="{{ route('logout') }}" class='sidebar-link' onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                      <i class="bi bi-power"></i>
                      <span>Logout</span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
              </li>
              

              <li class="sidebar-item  has-sub">
                  <a href="#" class='sidebar-link'>
                      <i class="bi bi-collection-fill"></i>
                      <span>Extra Components</span>
                  </a>
                  <ul class="submenu ">
                      <li class="submenu-item ">
                          <a href="{{ url('extra-component-avatar') }}">Avatar</a>
                      </li>
                      <li class="submenu-item ">
                          <a href="{{ url('extra-component-sweetalert') }}">Sweet Alert</a>
                      </li>
                      <li class="submenu-item ">
                          <a href="{{ url('extra-component-toastify') }}">Toastify</a>
                      </li>
                      <li class="submenu-item ">
                          <a href="{{ url('extra-component-rating') }}">Rating</a>
                      </li>
                      <li class="submenu-item ">
                          <a href="{{ url('extra-component-divider') }}">Divider</a>
                      </li>
                  </ul>
              </li>

              <li class="sidebar-item  has-sub">
                  <a href="#" class='sidebar-link'>
                      <i class="bi bi-grid-1x2-fill"></i>
                      <span>Layouts</span>
                  </a>
                  <ul class="submenu ">
                      <li class="submenu-item ">
                          <a href="{{ url('layout-default') }}">Default Layout</a>
                      </li>
                      <li class="submenu-item ">
                          <a href="{{ url('layout-vertical-1-column') }}">1 Column</a>
                      </li>
                      <li class="submenu-item ">
                          <a href="{{ url('layout-vertical-navbar') }}">Vertical with Navbar</a>
                      </li>
                      <li class="submenu-item ">
                          <a href="{{ url('layout-horizontal') }}">Horizontal Menu</a>
                      </li>
                  </ul>
              </li>
          </ul>
      </div>
      <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
</div>