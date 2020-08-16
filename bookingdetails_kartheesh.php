<?php
	session_start();
	$check=$_SESSION['userloggedin'];
	if($check!=true)
	{
		header('location:signin_kartheesh.php');
	}
	if(!isset($_SESSION['nb']))
	{
		header('location:newbookingpage_kartheesh.php');
	}
?>
<?php
	$con=mysqli_connect("us-cdbr-east-02.cleardb.com","b8293ab7f22cc5","9398b6ea") or die("Unable to connect!");
	mysqli_select_db($con,"heroku_da380dfb3ec7262");	
?>
<!DOCTYPE html>
<html>
	<head>
		<script>
			window.onbeforeunload = function () {
				window.scrollTo(0, 0);
			}; 
    </script>
		<meta charset="UTF-8">
		<meta name="description" content="A site for diagnostic test based on doctor's prescription">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">		
		<link href="carousel.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Booking Details Page</title>
	<style type="text/css">
		textarea {
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			width: 100%;
		}
		</style>
	</head>
	<body background="bg1.jpg">
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	<a class="navbar-brand" href="logoutpage_kartheesh.php"><img src="practo.png" height="40"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
	</button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav ml-auto" align="center">
      <li class="nav-item">
        <a class="nav-link" href="logoutpage_kartheesh.php">Home</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="#section2">Contact</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="customerinfo_kartheesh.php">View Booking History</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
		<main style="color:#ecf0f1;">
		<form style="margin:100px 100px;backdrop-filter:blur(5px);" action="bookingdetails_kartheesh.php" method="post">
			<div style="padding-left:20px;">
			<center><h2>Booking Details</h2></center>
			<fieldset>
			<legend><b>Fill the following details:<b></legend>
   			<h3>Personal details</h3><br>
			<span style="padding-right:138px;">
			<label for=Name>Customer's Name:</label>
				<input type='text' name= 'customer' required>
			</span>
			<span style="padding-right:138px;">
			<label for=Name>Mobile No:</label>
				<input type='text' name='mobile' required>
			</span>
			<label for=email>Email:</label>  
          
				<input style="padding-right:5px;" type='email' name='email' required>
			<br>
			<br>
			<label style="padding-right:75px;" for=address>Delivery Address:</label>  
              		<textarea name='address' rows=4 cols=150 required></textarea>
					
			<hr>
			<hr>
			<h3>Booking details</h3><br>
			<div id="container">
			<div id="left">
			<label for=date>Select a Date:</label> 
				<input type='date' name='date' required></br></br>
			</div>
			<div id="right">
			<tr>  
				<td><label style="padding-right:20px;" for=time>Pick a slot:</label></td>  
    				<td><select style="padding-right:17px;" name='time' style="width:160px">  
    				<option value="9:00AM-10:00AM">9:00AM-10:00AM</option>  
    				<option value="11:00AM-12:00PM">11:00AM-12:00PM</option>  
    				<option value="2:00PM-3:00PM">2:00PM-3:00PM</option>  
    				<option value="4:00PM-5:00PM">4:00PM-5:00PM</option>  
				</select>  
				</td>  
			</tr>
			</div>
			</div>
			<hr>
			<hr> 
			<input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit_btn" value="Submit">
			<hr>
			<a href="logoutpage_kartheesh.php"><input class="btn btn-lg btn-danger btn-block text-uppercase" type="button" value="Cancel"></a>
		    </fieldset>	
		</form>
		<?php
			
			if(isset($_POST['submit_btn']))
			{
				$customer =$_POST['customer'];
				$mobile = $_POST['mobile'];
				$email=$_POST['email'];
				$address=$_POST['address'];
				$date=$_POST['date'];
				$time=$_POST['time'];
				$username=$_SESSION['username'];
				$id=$_SESSION['id'];
				$query= "INSERT INTO bookingdetails values('$id','$username','$customer','$mobile','$email','$address','$date','$time',NULL)";
				$query_run = mysqli_query($con,$query);
						
				if($query_run)
				{
					$_SESSION['bd']=true;
					header('location:finalpage_kartheesh.php');
				}
				else
				{
					echo '<script type="text/javascript"> alert("Error!") </script>';
				}	
				mysqli_close($con);
			}
		?>
	</main>
	
	<footer class="site-footer" id="section2">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-4">
            <h6>Contact Us</h6>
            <p class="text-justify">Have questions about our products,
			<br>support services,or anything else?
			<br>Let us know and we'll get back to you.</p>
          </div>
		  <div class="col-sm-12 col-md-5">
            <h6>Address</h6>
            <p class="text-justify">Salarpuria symbiosis Arekere Village Begur,Bannerghatta 
			<br>Main Rd,Venugopal Reddy Layout,Venugopal Reddy
			<br>Layout, Uttarahalli Hobli, Bengaluru, Karnataka 560076</p>
          </div>
		  <div class="col-xs-12 col-md-2">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="https://www.practo.com/company/about">About Us</a></li>
              <li><a href="https://www.practo.com/company/contact">Contact Us</a></li>
              <li><a href="https://www.practo.com/company/privacy">Privacy Policy</a></li>
              <li><a href="https://www.practo.com/sitemap">Sitemap</a></li>
            </ul>
		  </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by 
         <a href="https://www.practo.com/">Practo</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
			<li><a href="https://www.facebook.com/practo/" class="fa fa-facebook"></a></li>
			<li><a href="https://twitter.com/Practo" class="fa fa-twitter"></a></li>
			<li><a href="https://www.google.com/search?safe=active&rlz=1C1JZAP_enIN782IN782&sxsrf=ALeKk02InS9shSlnWniEKW1ReC4eO-ckMg%3A1595936027928&ei=Gw0gX5qfOIbfz7sPjcuqkAE&q=practo&oq=practo&gs_lcp=CgZwc3ktYWIQAzIECCMQJzIECCMQJzIECCMQJzIFCAAQkQIyBAgAEEMyAggAMgIIADICCAAyAggAMgQIABBDOgQIABBHOgYIABAWEB46BwgAEBQQhwI6CAgAELEDEJECUOAvWLM-YNZDaABwAXgAgAGMAogBxw-SAQUwLjIuN5gBAKABAaoBB2d3cy13aXrAAQE&sclient=psy-ab&ved=0ahUKEwjamJ2A7e_qAhWG73MBHY2lChIQ4dUDCAw&uact=5" class="fa fa-google"></a></li>
			<li><a href="https://www.youtube.com/channel/UCGlsl2YPuCvklhbUWu1vuqQ" class="fa fa-youtube"></a></li>
			<li><a href="https://www.instagram.com/practo/" class="fa fa-instagram"></a></li>
            </ul>
          </div>
        </div>
      </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  	


	</body>
</html>