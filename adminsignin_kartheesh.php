<?php
	session_start();
	if(isset($_SESSION['userloggedin']))
	{
		header('location:logoutpage_kartheesh.php');
	}
	if(isset($_SESSION['adminloggedin']))
	{
		header('location:database_kartheesh.php');
	}
?>
<?php
	$con=mysqli_connect("us-cdbr-east-02.cleardb.com","b8293ab7f22cc5","9398b6ea") or die("Unable to connect!");
	mysqli_select_db($con,"heroku_da380dfb3ec7262");	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login Page</title>
	<script>
			window.onbeforeunload = function () {
					window.scrollTo(0, 0);
				}; 
	</script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="signin.css">
	<meta charset="UTF-8">
		<meta name="description" content="A site for diagnostic test based on doctor's prescription">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">		
		<link href="carousel.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color:#95a5a6">


<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	<a class="navbar-brand" href="landingpage_kartheesh.php"><img src="practo.png" height="40"></a>
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
    </ul>
  </div>
</nav>



	<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Admin Login</h5>
			<center>
			<img src="admin.jpg" class="image"/>
			</center>
			<br>
            <form class="form-signin" action="adminsignin_kartheesh.php" method="post">
              <div class="form-label-group">
                <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
              </div>
              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
              </div>
				<br>
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
			  <hr class="my-4">
              <input class="btn btn-lg btn-primary btn-block text-uppercase" name="signin_btn" type="submit" value="Sign In">
			</form>
			<?php
			if(isset($_POST['signin_btn']))
			{
				$username=$_POST['username'];
				$password=$_POST['password'];
				$qwery="SELECT * FROM admin WHERE username='$username' AND password='$password'";
				$qwery_run=mysqli_query($con,$qwery);
				if($qwery_run)
				{
					if(mysqli_num_rows($qwery_run))
					{
						$row=mysqli_fetch_assoc($qwery_run);
						$_SESSION['adminloggedin']=true;
						
						header('location:database_kartheesh.php');
					}
					else
					{
						$_SESSION['adminloggedin']=false;
						echo '<script type="text/javascript"> alert("Invalid Credentials!")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript"> alert("Error!")</script>';
				}
				mysqli_close($con);
			}
		?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  
  
 <!-- Site footer -->
    <footer style="margin-bottom:0px;" class="site-footer" id="section2">
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