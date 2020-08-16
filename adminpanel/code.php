<?php
	session_start();
	$con=mysqli_connect("us-cdbr-east-02.cleardb.com","b8293ab7f22cc5","9398b6ea") or die("Unable to connect!");
	mysqli_select_db($con,"heroku_da380dfb3ec7262");
	if(isset($_POST['del_btn']))
	{
		$test=$_POST["view_test"];
		$id=$_POST["view_id"];
		$query  = "DELETE FROM tests WHERE id='$id' AND test='$test';
				   DELETE FROM labs WHERE test_id='$id'";
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
		$query= "DELETE FROM labs WHERE test_id='$id' AND lab='$lab'";
		$query_run = mysqli_multi_query($con,$query);
		if($query_run)
		{
			$_SESSION["success"]="'$lab' is successfully deleted!";
			header('location:labs.php');
		}
		else
		{
			$_SESSION["status"]="Error!'$lab' is not deleted";
			header('location:labs.php');
		}
	}
	
	
	if(isset($_POST['addlab_btn']))
	{
		$id=$_POST["view_id"];
		$lab=$_POST["addlab"];
		$query="INSERT INTO labs VALUES('','$id','$lab')";
				
		$query_run = mysqli_multi_query($con,$query);
		if($query_run)
		{
			$_SESSION["success"]="'$lab' is successfully added!";
			header('location:labs.php');			
		}	
		else
		{
			$_SESSION["status"]="Error!'$lab' is not added";
			header('location:labs.php');
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
	
	
	if(isset($_POST['logout_admin']))
	{
		require('logout.php');
		header('location:../landingpage_kartheesh.php');
	}
	
	
	mysqli_close($con);
?>