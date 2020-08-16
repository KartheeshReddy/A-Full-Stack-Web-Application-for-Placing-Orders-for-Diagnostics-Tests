<?php
	session_start();
	if(isset($_SESSION['userloggedin']))
	{
		header('location:logoutpage_kartheesh.php');
	}
	if(isset($_SESSION['adminloggedin']))
	{
		header('location:adminpanel/index.php');
	}
?>
<!doctype html>
<html lang="en">
  <head>
	<script>
     window.onbeforeunload = function () {
            window.scrollTo(0, 0);
        }; 
    </script>
    <meta charset="utf-8">
	<meta name="description" content="A site for diagnostic test based on doctor's prescription">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link href="carousel.css" rel="stylesheet">
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Landing Page</title>
  </head>
  <body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	<a class="navbar-brand" href="landingpage_kartheesh.php"><img src="practo.png" height="40"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
	</button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav ml-auto" align="center">
      <li class="nav-item">
        <a class="nav-link" href="landingpage_kartheesh.php">Home</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="#section1">About</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="#section2">Contact</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="adminsignin_kartheesh.php">Admin</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="register_kartheesh.php">Sign Up</a>
      </li>
    </ul>
  </div>
</nav>



<main role="main">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block img-fluid mx-auto" src="slide 1.png">
      </div>
      <div class="carousel-item">
        <img class="d-block img-fluid mx-auto" src="slide 2.png">
      </div>
      <div class="carousel-item">
        <img class="d-block img-fluid mx-auto" src="slide 3.png">
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h2 style="padding-left:20px;">Features</h2>
        <ul>
						<li>Search doctors nearby</li>
                        <li>Online consultations</li>
                        <li>Book your appointments online</li>
                        <li>Setting up the reminders for the medicine</li>
                        <li>Online booking for a lab test</li>
                        <li>24/7 service</li>
        </ul>
	</div>
      <div class="col-md-4">
        <h2 style="padding-left:20px;">Advantages</h2>
	<ul>
                        <li>No Need to Travel</li>
                        <li>Improved ways to check your symptoms</li>
                        <li>Save Your Money</li>
                        <li>Privacy and Security</li>
                        <li>Comfortable and Convenient</li>
                        <li>No Risk of Infections From Doctor's Clinic</li>
	</ul>
      </div>
      <div class="col-md-4">
        <h2 style="padding-left:20px;">The Practo app</h2>
	<ul>
                        <li>Book appointments</li>
                        <li>Order health products</li>
                        <li>Chat with a doctor online</li>
                        <li>Book health chekups</li>
                        <li>Store health records</li>
                        <li>Read health tips</li>
	</ul>
      </div>
    </div>
	
	
	
	
	<hr id="section1" class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Your home for health</h2>
        <p class="lead"> For millions of people, Practo is the trusted and familiar home where they know they&apos;ll find a healing touch. It connects them with everything they need to take good care of themselves and their family - assessing health issues, finding the right doctor, booking diagnostic tests, obtaining medicines, storing health records or learning new ways to live healthier.</p>
      </div>
      <div class="col-md-5">
        <img src="image4.jpg" width="500px" height="333px"/>
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Diverse people.<span class="text-muted">One purpose.</span></h2>
        <p class="lead">We are dreamers, thinkers and do-ers rolled into one.Together, we want to improve the healthcare experience for all humanity. We are guided by our values and driven by our motto to do great. These are not just principles for our products or our company, but they are a reflection of who we are as people.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img style="padding-right:50px;padding-top:20px;margin-top:70px" src="image5.jpg" width="500px" height="250px"/>
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Do Great.</span></h2>
        <p class="lead">Do Great is our motto and is the hallmark of a true Practeon. It signifies the intrinsic motivation in each Practeon to strive for excellence. Every time. This means Practeons do their best work, not for want of rewards or recognitions but because they expect it of themselves.</p>
      </div>
      <div class="col-md-5">
        <img style="margin-top:20px;"src="image7.jpg" height="277px"/>
      </div>
    </div>
	<br>
	<br>
    <hr>
	
	<div style="background-color:#ff9ff3;padding-bottom:20px;" class="container" id="home">
            <center><h3 style="padding-bottom:20px;">Introducing Video Consultations.Don&apos;t delay your health concerns.</h3></center>
            <div class="row justify-content-center">
                <div class="col-md-5">
				<center>
						<a href="signin_kartheesh.php"><button class="btn btn-success"><h4>Book a Diagnostic Test</h4></button></a>
                </center>
				</div>
            </div>
    </div>
	
	<hr id="section2">
	

    <footer class="site-footer">
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
			<br>Layout, Uttarahalli Hobli, Bengaluru, Karnataka 560076.</p>
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