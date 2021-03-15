  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="assets/dist/img/msl-logo2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MW-<b>MSLC</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!--<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>-->

      <!-- SidebarSearch Form -->
      <!--<div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{!! url('/'); !!}" class="nav-link">
                  <i class="far fa-circle nav-play"></i>
                  <p>Test Link  1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{!! url('/'); !!}" class="nav-link">
                  <i class="far fa-circle nav-play"></i>
                  <p>Test Link 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{!! url('/'); !!}" class="nav-link active">
                  <i class="far fa-circle nav-play"></i>
                  <p>Test Link 3</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{!! url('/'); !!}" class="nav-link">
              <i class="nav-icon fas fa-play"></i>
              <p>
                Test Connection
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Connector Config
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{!! url('/'); !!}" class="nav-link">
                  <i class="far fa-cog"></i>
                  <p>WEB-HR Config</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{!! url('/'); !!}" class="nav-link">
                  <i class="far fa-cog"></i>
                  <p>SAP-Journal Config</p>
                </a>
              </li>

            </ul>
          </li>
       


          <li class="nav-header">ADMIN TOOLS</li>
          <li class="nav-item">

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{!! url('/'); !!}" class="nav-link">
                  <i class="far fa-users"></i>
                  <p>User Mgt.</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{!! url('/'); !!}" class="nav-link">
                  <i class="far fa-unlock"></i>
                  <p>Update Password</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="{!! url('/logout'); !!}" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>Logout</p>
            </a>
          </li>

            </ul>
          </li>

          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  </div>
  <!-- /.sidebar -->
</aside>