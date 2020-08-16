<?php
	session_start();
	$con=mysqli_connect("us-cdbr-east-02.cleardb.com","b8293ab7f22cc5","9398b6ea") or die("Unable to connect!");
	mysqli_select_db($con,"heroku_da380dfb3ec7262");
	$check=$_SESSION['adminloggedin'];
	if($check!=true)
	{
		header('location:../adminsignin_kartheesh.php');
	}
	include("includes/header.php");
	include("includes/navbar.php");
?>

	<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <li class="nav-item dropdown no-arrow ml-auto">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
				
                <img class="img-profile rounded-circle" src="admin.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
		  
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		  </div>
			
			
			
          <!-- Content Row -->
          <div class="row">

            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registrations</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
					  <?php
						$query="SELECT * FROM register";
						$query_run=mysqli_query($con,$query);
						$row=mysqli_num_rows($query_run);
						echo '<h1>'.$row.'</h1>';
					  ?>
					  </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Bookings</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
						<?php
						$query="SELECT r.username,r.password,n.test,n.prescription,n.lab,b.customer,b.mobile,b.email,b.address,b.date,b.time,b.id,b.status
							FROM heroku_da380dfb3ec7262.register AS r 
							JOIN heroku_da380dfb3ec7262.newbookingpage AS n
							JOIN heroku_da380dfb3ec7262.bookingdetails AS b
							ON (r.username=n.username) AND (r.username=b.username) AND (n.id=b.id)";
						$query_run=mysqli_query($con,$query);
						$row=mysqli_num_rows($query_run);
						echo '<h1>'.$row.'</h1>';
					  ?>
					  </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-list-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Available Tests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
					  <?php
						$query="SELECT * FROM tests";
						$query_run=mysqli_query($con,$query);
						$row=mysqli_num_rows($query_run);
						echo '<h1>'.$row.'</h1>';
					  ?>
					  </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-stethoscope fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Available Labs</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
					  <?php
						$query="SELECT DISTINCT lab FROM labs";
						$query_run=mysqli_query($con,$query);
						$row=mysqli_num_rows($query_run);
						echo '<h1>'.$row.'</h1>';
						mysqli_close($con);
					  ?>
					  </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clinic-medical fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    <!-- End of Content Wrapper -->

  
<?php
	include("includes/scripts.php");
	include("includes/footer.php");
?>
  
