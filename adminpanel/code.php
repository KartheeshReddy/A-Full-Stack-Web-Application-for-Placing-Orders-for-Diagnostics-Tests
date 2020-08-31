<?php
	session_start();
	$con=mysqli_connect("us-cdbr-east-02.cleardb.com","b8293ab7f22cc5","9398b6ea") or die("Unable to connect!");
	mysqli_select_db($con,"heroku_da380dfb3ec7262");
	if(isset($_POST['del_btn']))
	{
		$test=$_POST["view_test"];
		$id=$_POST["view_id"];
		$query  = "DELETE FROM tests WHERE id='$id' AND test='$test'";
		$query_run = mysqli_multi_query($con,$query);		
		if($query_run)
		{
			$_SESSION["success"]="'$test' is successfully deleted!";
			header('location:tests.php');
		}
		else
		{
			$_SESSION["status"]="Error!'$test' is not deleted";
			header('location:tests.php');
		}
	}
	
	
	if(isset($_POST['addtest_btn']))
	{
		$test=$_POST["addtest"];
		$_SESSION["test_id"]=rand();
		$id=$_SESSION["test_id"];
		$query="INSERT INTO tests VALUES('$id','$test')";
		$query_run = mysqli_multi_query($con,$query);
		if($query_run)
		{
			$_SESSION["success"]="'$test' is successfully added!";
			header('location:tests.php');			
		}	
		else
		{
			$_SESSION["status"]="Error!'$test' is not added";
			header('location:tests.php');
		}
	}

	
	
	
	if(isset($_POST['labdel_btn']))
	{
		$id=$_POST["view_id"];
		$lab=$_POST["view_lab"];
		$query= "DELETE FROM lab WHERE lab='$lab'";
		$query_run = mysqli_multi_query($con,$query);
		if($query_run)
		{
			$_SESSION["success"]="'$lab' is successfully deleted!";
			header('location:labslist.php');
		}
		else
		{
			$_SESSION["status"]="Error!'$lab' is not deleted";
			header('location:labslist.php');
		}
	}
	
	
	if(isset($_POST['addlab_btn']))
	{
		$id=rand();
		$lab=$_POST["addlab"];
		$query="INSERT INTO lab VALUES('$id','$lab')";
				
		$query_run = mysqli_multi_query($con,$query);
		if($query_run)
		{
			$_SESSION["success"]="'$lab' is successfully added!";
			header('location:labslist.php');			
		}	
		else
		{
			$_SESSION["status"]="Error!'$lab' is not added";
			header('location:labslist.php');
		}
	}
	
	
	if(isset($_POST['approve_btn']))
	{
		$id=$_POST["approve_id"];
		$username=$_POST["approve_username"];
		$query= "UPDATE bookingdetails SET status='Approved' WHERE id='$id' AND username='$username'";
		$query_run = mysqli_query($con,$query);
		if($query_run)
		{
			$_SESSION["success"]="Booking Id:'$id' is successfully approved!";
			header('location:tables.php');
		}
		else
		{
			$_SESSION["status"]="Error!Booking Id:'$id' is not approved!";
			header('location:tables.php');
		}
	}
	
	
	
	if(isset($_POST['reject_btn']))
	{
		$id=$_POST["reject_id"];
		$username=$_POST["reject_username"];
		$query= "UPDATE bookingdetails SET status='Rejected' WHERE id='$id' AND username='$username'";
		$query_run = mysqli_query($con,$query);
		if($query_run)
		{
			$_SESSION["success"]="Booking Id:'$id' is successfully rejected!";
			header('location:tables.php');
		}
		else
		{
			$_SESSION["status"]="Error!Booking Id:'$id' is not rejected!";
			header('location:tables.php');
		}
	}
	
	if(isset($_POST['assign_teststolab']))
	{
		$lab=$_POST['view_lab'];
		foreach($_POST['tests'] as $test)
		{
        $query= 'INSERT INTO assign(test_id,lab) VALUES ("'. $test .'","'. $lab .'")';
        $query_run = mysqli_query($con,$query);
		if($query_run)
		{
			$_SESSION["success"]="Tests assigned to '$lab' successfully!";
			header('location:assign_teststolab.php');
		}
		else
		{
			$_SESSION["status"]="Error!Tests not assigned to '$lab'!";
			header('location:assign_teststolab.php');
		}
		}
	}
	
	if(isset($_POST['assign_testtolabs']))
	{
		$id=$_POST['view_id'];
		$test=$_POST['view_test'];
		foreach($_POST['labs'] as $lab)
		{
        $query= 'INSERT INTO assign(test_id,lab) VALUES ("'. $id .'","'. $lab .'")';
        $query_run = mysqli_query($con,$query);
		if($query_run)
		{
			$_SESSION["success"]="'$test' is assigned to lab(s) successfully!";
			header('location:assign_teststolab.php');
		}
		else
		{
			$_SESSION["status"]="Error!'$test' not assigned to lab(s)!";
			header('location:assign_teststolab.php');
		}
		}
	}
	
/*	if(isset($_POST['sc_btn']))
	{
		
		$tests=array();
		$query="SELECT * FROM tests";
		if($query_run=mysqli_query($con,$query))
		{
			if(mysqli_num_rows($query_run))
			{
				while($row=mysqli_fetch_assoc($query_run))
				{
						array_push($tests,$row["id"]);
								
					?>
								
						<th scope="col"><?php echo $row["test"]; ?></th>
									
					<?php
							
				}
						
			}
			else
			{
				echo "No data found!";
			}
		}
		
			
		$uncheck=array();	
		if(!empty($_POST['check'])!=0)
		{
			foreach($tests as $test_id)
			{
				if(!in_array($test_id,$_POST['check']))
				{
					array_push($uncheck,$test_id);
				}
			}
		}
			
			
		if(!empty($uncheck)!=0)
		{
		foreach($uncheck as $test_id)
		{
		
		
		
			$query1= "DELETE FROM assign WHERE lab='$lab' AND test_id='$test_id'";
			$query_run1 = mysqli_query($con,$query1);
		}
		
		}
			
			
		
		$lab=$_POST['view_lab'];
		if(!empty($_POST['check'])!=0)
		{
		foreach($_POST['check'] as $test_id)
		{
		
        $query2= 'INSERT INTO assign(test_id,lab) VALUES ("'. $test_id .'","'. $lab .'");';
        $query_run2 = mysqli_query($con,$query2);
		
		if($query_run1 && $query_run2)
		{
			$_SESSION["success"]="Multiple test(s) assigned to multiple lab(s) successfully!";
			header('location:assign.php');
		}
		else
		{
			$_SESSION["status"]="Error!";
			header('location:assign.php');
		}
		}
		}
	
	
	
	}*/
	
	
	
	if(isset($_POST['sc_btn']))
	{
		
		
		$lab=$_POST['view_lab'];
		
		$query1= "DELETE FROM assign WHERE lab='$lab'";
		$query_run1 = mysqli_query($con,$query1);
		
		if(!empty($_POST['check'])!=0)
		{
		foreach($_POST['check'] as $test_id)
		{
		
        $query2= 'INSERT INTO assign(test_id,lab) VALUES ("'. $test_id .'","'. $lab .'");';
        $query_run2 = mysqli_query($con,$query2);
		
		if($query_run1 && $query_run2)
		{
			$_SESSION["success"]="Multiple test(s) assigned to multiple lab(s) successfully!";
			header('location:assign.php');
		}
		else
		{
			$_SESSION["status"]="Error!";
			header('location:assign.php');
		}
		}
		}
		else
		{
			header('location:assign.php');
		}
	
	
	
	}
	
	
	
	
	
	
	if(isset($_POST['logout_admin']))
	{
		require('logout.php');
		header('location:../landingpage_kartheesh.php');
	}
	
	
	mysqli_close($con);
?>