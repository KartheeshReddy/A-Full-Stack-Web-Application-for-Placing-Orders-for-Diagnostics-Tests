<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
			
          <i><img src="practo.png" height="40"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Page</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="registrations.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Registrations</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-list-alt"></i>
          <span>Bookings</span></a>
      </li>
	  
	  
	  <li class="nav-item">
        <a class="nav-link" href="tests.php">
          <i class="fas fa-fw fa-stethoscope"></i>
          <span>Available Tests</span></a>
      </li>
	  
	  
	  <li class="nav-item">
        <a class="nav-link" href="labslist.php">
          <i class="fas fa-fw fa-clinic-medical"></i>
          <span>Available Labs</span></a>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link" href="assign.php">
          <span>
		  <i class="fas fa-fw fa-vials"></i>
		  Assign 
		  tests
		  to
		  labs
		  <i class="fas fa-fw fa-flask"></i>
		  </span></a>
      </li>
	  
	  

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
	<!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
		  <form action="code.php" method="post">
		  <input type="submit" name="logout_admin" class="btn btn-primary" value="Logout"> 
		  </form>
        </div>
      </div>
    </div>
  </div>