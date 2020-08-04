<?php
	session_start();
	$check=$_SESSION['adminloggedin'];
	if($check!=true)
	{
		header('location:adminsignin_kartheesh.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<script>
     window.onbeforeunload = function () {
            window.scrollTo(0, 0);
        }; 
    </script>
	<title>Website's Database</title>
	<meta charset="UTF-8">
		<meta name="description" content="A site for diagnostic test based on doctor's prescription">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<style type="text/css">
		h2{
			margin-top:75px;
		}
		h3{
			margin-top:5px;
			color:#34495e;
		}
		table{
			margin-top:30px;
			border-collapse:collapse;
			width:100%;
			color:#d96459;
			font-family:monospace;
			font-size:25px;
			text-align:left;
		}
		th{
			background-color:#d96459;
			color: white;
		}
		table, th, td {
			border: 1px solid #b2bec3;
			border-collapse: collapse;
		}
		tr:nth-child(even){background-color:#f2f2f2}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	<a class="navbar-brand" href="#"><img src="practo.png" height="40"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
	</button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav ml-auto" align="center">
	  <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
	<table>
		<center>
			<h2>
				Welcome Admin!
			</h2>
			<br>
			<br>
			<h3>Admin Details</h3>
		</center>
		<tr>
			<th>Id</th>
			<th>Username</th>
			<th>Password</th>
		</tr>
		<?php
			$con=mysqli_connect("us-cdbr-east-02.cleardb.com","b8293ab7f22cc5","9398b6ea") or die("Unable to connect!");
			mysqli_select_db($con,"heroku_da380dfb3ec7262");
			$query="SELECT *
					FROM heroku_da380dfb3ec7262.admin";
			if($query_run=mysqli_query($con,$query))
			{
			if(mysqli_num_rows($query_run))
			{
				while($row=mysqli_fetch_assoc($query_run))
				{
					echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["password"]."</td></tr>";			
				}
				echo "</table>";
			}
			else
			{
				echo "No data found!";
			}
			}
			mysqli_close($con);
		?>	
	<hr>
	<hr>
	</table>
	<table>
		<center>
			<br>
			<br>
			<h3>Registered Customers</h3>
		</center>
		<tr>
			<th>S.No</th>
			<th>Username</th>
			<th>Password</th>
		</tr>
		<?php
			$con=mysqli_connect("us-cdbr-east-02.cleardb.com","b8293ab7f22cc5","9398b6ea") or die("Unable to connect!");
			mysqli_select_db($con,"heroku_da380dfb3ec7262");
			$query="SELECT *
					FROM heroku_da380dfb3ec7262.register";
			if($query_run=mysqli_query($con,$query))
			{
			if(mysqli_num_rows($query_run))
			{
				$i=1;
				while($row=mysqli_fetch_assoc($query_run))
				{
					echo "<tr><td>".$i."</td><td>".$row["username"]."</td><td>".$row["password"]."</td></tr>";			
					$i+=1;
				}
				echo "</table>";
			}
			else
			{
				echo "No data found!";
			}
			}
			mysqli_close($con);
		?>	
	<hr>
	<hr>
	</table>
	<table>
		<center>
		<br>
		<br>
		<h3>
		Customer Booking Details
		</h3>
		</center>
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
			<th>Status</th>
		</tr>
		<?php
			$con=mysqli_connect("us-cdbr-east-02.cleardb.com","b8293ab7f22cc5","9398b6ea") or die("Unable to connect!");
			mysqli_select_db($con,"heroku_da380dfb3ec7262");
			
			$query="SELECT r.username,r.password,n.test,n.prescription,n.lab,b.customer,b.mobile,b.email,b.address,b.date,b.time,b.id,b.status
					FROM heroku_da380dfb3ec7262.register AS r 
					JOIN heroku_da380dfb3ec7262.newbookingpage AS n
					JOIN heroku_da380dfb3ec7262.bookingdetails AS b
					ON (r.username=n.username) AND (r.username=b.username) AND (n.id=b.id)";
			if($query_run=mysqli_query($con,$query))
			{
			if(mysqli_num_rows($query_run))
			{
				while($row=mysqli_fetch_assoc($query_run))
				{
					echo "<tr><td>".$row["id"]."</td><td>".$row["customer"]."</td><td>".$row["username"]."</td><td>".$row["password"]."</td><td>".$row["test"]."</td><td>".$row["prescription"]."</td><td>".$row["lab"]."</td><td>".$row["mobile"]."</td><td>".$row["email"]."</td><td>".$row["address"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td><td>".$row["status"]."</td></tr>";			
					
				}
				echo "</table>";
			}
			else
			{
				echo "No data found!";
			}
			}
			mysqli_close($con);
		?>		
	</table>
	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  	
	
	
</body>
</html>