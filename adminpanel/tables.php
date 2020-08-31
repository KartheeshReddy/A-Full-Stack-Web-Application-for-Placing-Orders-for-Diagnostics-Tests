<?php
	session_start();
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

         
		<?php
			if(isset($_SESSION['success']) && $_SESSION['success']!='')
			{
				echo '<center><h2 class="bg-primary text-white">'.$_SESSION['success'].'</h2></center>';
				unset($_SESSION['success']);
			}
			if(isset($_SESSION['status']) && $_SESSION['status']!='')
			{
				echo '<center><h2 class="bg-danger text-white">'.$_SESSION['status'].'</h2></center>';
				unset($_SESSION['status']);
			}
		  ?>	
			
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <center><h6 class="m-0 font-weight-bold text-primary">Customer Booking Details</h6></center>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
						<th>Id</th>
						<th>Customer's Name</th>
						<th>Username</th>
						<th>Password</th>
						<th>Test</th>
						<th>Prescription</th>
						<th>Lab</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Address</th>
						<th>Date</th>
						<th>Time</th>
						<th colspan="2"><center>Action</center></th>
						<th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
						<th>Id</th>
						<th>Customer's Name</th>
						<th>Username</th>
						<th>Password</th>
						<th>Test</th>
						<th>Prescription</th>
						<th>Lab</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Address</th>
						<th>Date</th>
						<th>Time</th>
						<th colspan="2"><center>Action</center></th>
						<th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  <?php
					$con=mysqli_connect("us-cdbr-east-02.cleardb.com","b8293ab7f22cc5","9398b6ea") or die("Unable to connect!");
	mysqli_select_db($con,"heroku_da380dfb3ec7262");
					
					$query="SELECT r.username,r.password,t.test,n.prescription,n.lab,b.customer,b.mobile,b.email,b.address,b.date,b.time,b.id,b.status
							FROM heroku_da380dfb3ec7262.register AS r 
							JOIN heroku_da380dfb3ec7262.tests AS t
							JOIN heroku_da380dfb3ec7262.newbookingpage AS n
							JOIN heroku_da380dfb3ec7262.bookingdetails AS b
							ON (r.username=n.username) AND (r.username=b.username) AND (n.id=b.id) AND (n.test=t.id)";
					if($query_run=mysqli_query($con,$query))
					{
						if(mysqli_num_rows($query_run))
						{
							while($row=mysqli_fetch_assoc($query_run))
							{
								?>
									<tr>
										<td><?php echo $row["id"]; ?></td>
										<td><?php echo $row["customer"]; ?></td>
										<td><?php echo $row["username"]; ?></td>
										<td><?php echo $row["password"]; ?></td>
										<td><?php echo $row["test"]; ?></td>
										<td><?php echo $row["prescription"]; ?></td>
										<td><?php echo $row["lab"]; ?></td>
										<td><?php echo $row["mobile"]; ?></td>
										<td><?php echo $row["email"]; ?></td>
										<td><?php echo $row["address"]; ?></td>
										<td><?php echo $row["date"]; ?></td>
										<td><?php echo $row["time"]; ?></td>
										<td>
											<form action="code.php" method="post">
												<input type="hidden" name="approve_id" value="<?php echo $row["id"]; ?>">
												<input type="hidden" name="approve_username" value="<?php echo $row["username"]; ?>">
												<button name="approve_btn" type="submit" class="btn btn-success">Approve</button>
											</form>
										</td>
										<td>
											<form action="code.php" method="post">
												<input type="hidden" name="reject_id" value="<?php echo $row["id"]; ?>">
												<input type="hidden" name="reject_username" value="<?php echo $row["username"]; ?>">
												<button name="reject_btn" type="submit" class="btn btn-danger">Reject</button>
											</form>
										</td>
										<td><?php echo $row["status"]; ?></td>
									</tr>
								<?php
							}		
						}
						else
						{
							echo "No data found!";
						}
					}
					mysqli_close($con);
				?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      

    <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Practo 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
 

</body>

</html>
