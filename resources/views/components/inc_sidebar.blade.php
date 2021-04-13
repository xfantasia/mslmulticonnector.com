  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{ url('assets/dist/img/msl-logo2.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>MSMC </b> <small> 1.0</small></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!--<div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>-->
        <div class="info">
          <a href="#" style="color:orange;" class="d-block"><b>{{Auth::user()->company_name ?? ''}}</b></a>
        </div>
      </div>

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
                <a href="{!! url('/dashboard'); !!}" class="nav-link activex">
                  <i class="bi bi-bar-chart-line"></i>
                  <p>
                   <b>SYSTEM STATISTICS</b>  
                  </p>
                </a>
                </li>

          <li class="nav-item menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-network-wired"></i>
              <p>
               <b>CONNECTORS</b>  
                <i class="right fas fa-angle-double-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{!! url('/'); !!}" class="nav-link">
                  <i class="fas fa-atom nav-play"></i>&nbsp;
                  <p>Create Connector</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{!! url('/'); !!}" class="nav-link">
                  <i class="fas fa-project-diagram"></i>&nbsp;
                  <p>View Connectors</p>
                </a>
              </li>
            </ul>
          </li>




          <li class="nav-header">INTERNAL API SYSTEM </li>
          <li class="nav-item menu-closed">
            <a href="#" class="nav-link activex">
              <i class="nav-icon fas fa-desktop"></i>
              <p>
               <b>SAP API SYSTEMS</b>  
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{!! url('/sap_financial_systems/create'); !!}" class="nav-link">
                  <i class="fas fa-laptop"></i>&nbsp;
                  <p>Create Financial System</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{!! url('/sap_financial_services/create'); !!}" class="nav-link">
                  <i class="fas fa-cubes"></i>&nbsp;
                  <p>Create Financial Service</p>
                </a>
              </li>

            </ul>
          </li>



          <li class="nav-item menu-closed">
            <a href="#" class="nav-link activex">
              <i class="nav-icon fas fa-code-branch"></i>
              <p>
               <b>C-COMPONENTS</b>  
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{!! url('/sap_communication_arrangements/create'); !!}" class="nav-link">
                  <i class="fas fa-cogs nav-play"></i>&nbsp;
                  <p>Configure Communication Arrangement</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{!! url('/sap_communication_components/create'); !!}" class="nav-link">
                  <i class="fas fa-cogs"></i>&nbsp;
                  <p>Setup Communication Components</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-header">EXTERNAL API SYSTEM </li>
          <li class="nav-item menu-closed">
            <a href="#" class="nav-link activex">
              <i class="nav-icon fas fa-globe"></i>
              <p>
               <b>WEB-HR Payroll</b>  
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{!! url('/webhr_payroll_config/create'); !!}" class="nav-link">
                  <i class="fas fa-cogs nav-play"></i>&nbsp;
                  <p>Payroll Config</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{!! url('/webhr_payroll_config'); !!}" class="nav-link">
                  <i class="fas fa-cogs"></i>&nbsp;
                  <p>View Payroll Config</p>
                </a>
              </li>

            </ul>
          </li>



          
          <li class="nav-header">VIEW SYSTEMS / COMPONENTS </li>
          <li class="nav-item menu-closed">
            <a href="#" class="nav-link activex">
              <i class="nav-icon fas fa-desktop"></i>
              <p>
               <b>VIEW SAP</b>  
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{!! url('/sap_financial_systems'); !!}" class="nav-link">
                  <i class="fas fa-long-arrow-alt-right"></i>&nbsp;
                  <p>View Financial Systems</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{!! url('/sap_financial_services'); !!}" class="nav-link">
                  <i class="fas fa-long-arrow-alt-right"></i>&nbsp;
                  <p>View Financial Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{!! url('/sap_communication_arrangements'); !!}" class="nav-link">
                  <i class="fas fa-long-arrow-alt-right"></i>&nbsp;
                  <p>View Communication Arrangements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{!! url('/sap_communication_components'); !!}" class="nav-link">
                  <i class="fas fa-long-arrow-alt-right"></i>&nbsp;
                  <p>View Communication Components</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item menu-closed">
            <a href="#" class="nav-link activex">
              <i class="nav-icon fas fa-globe"></i>
              <p>
               <b>VIEW WEB-HR</b>  
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{!! url('/webhr_payroll_config'); !!}" class="nav-link">
                  <i class="fas fa-long-arrow-alt-right nav-play"></i>&nbsp;
                  <p>View Payroll Config</p>
                </a>
              </li>

            </ul>
          </li>
       


          <li class="nav-header">ADMIN TOOLS </li>
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
                  <i class="fas fa-user nav-play"></i>&nbsp;
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{!! url('/'); !!}" class="nav-link">
                  <i class="fas fa-key"></i>
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