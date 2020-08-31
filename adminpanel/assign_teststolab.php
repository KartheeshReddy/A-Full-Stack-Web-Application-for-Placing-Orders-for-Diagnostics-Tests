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
              <center><h6 class="m-0 font-weight-bold text-primary">Assign multiple tests to a lab</h6></center>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
						<th>Id</th>
						<th>Lab</th>
						<th>Assign tests</th>
						<th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
						<th>Id</th>
						<th>Lab</th>
						<th>Assign tests</th>
						<th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  <?php
					$con=mysqli_connect("localhost","root","") or die("Unable to connect!");
					mysqli_select_db($con,"mentormind");
					
					$query="SELECT * FROM lab";
					if($query_run=mysqli_query($con,$query))
					{
					if(mysqli_num_rows($query_run))
					{
						while($row=mysqli_fetch_assoc($query_run))
						{
							$lab_id=$row["id"];
							$lab=$row["lab"];
							?>
								<tr>
									<td><?php echo $row["id"]; ?></td>
									<td><?php echo $row["lab"]; ?></td>
									
									<td>
										<form action="code.php" method="post">
											<div class="form-group">
												<select id="tests" name="tests[]" multiple="multiple" class="form-control">
													<option value="" disabled selected>-Choose Test(s)-</option>
													
													<?php $query =mysqli_query($con,"SELECT * FROM tests");
														
														while($row=mysqli_fetch_array($query))
														{
															$test_id=$row["id"];
													?>
													<option value="<?php echo $test_id;?>"><?php echo $row['test'];?></option>
													<?php
													}
													?>
												</select>
											</div>
									</td>
									<td>
											<input type="hidden" name="view_lab" value="<?php echo $lab; ?>">
											<input name="assign_teststolab" type="submit" class="btn btn-outline-primary" value='Save Changes'>
										</form>
									</td>
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


