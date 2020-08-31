<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <?php
	$con=mysqli_connect("localhost","root","") or die("Unable to connect!");
					mysqli_select_db($con,"mentormind");
	?>
    
	
	<form method="post" id="f1" action="test.php">
	<input type="text" name="something1">
	<input type="text" name="something2">
	</form>

	<form method="post" id="f2" action="test.php">
	<input type="text" name="something1">
	<input type="text" name="something2">
	</form>
	
	<button type="submit" id="btn">My click text</button>
	
	<script>
   $('#btn').click(function(){
       form1 = $('#f1');
       form2 = $('#f2');
       $.ajax({
        type: "POST",
        url: form1.attr('action'),
        data: form1.serialize(),
        success: function( response ) {
          console.log( response );
        }
      });
      $.ajax({
          type: "POST",
          url: form2.attr('action'),
          data: form2.serialize(),
          success: function( response2 ) {
            console.log( response2 );
          }
      });
   });
</script>

	<?php
		$t1=$_POST['something1'];
		$t2=$_POST['something2'];
		$query="INSERT INTO assign VALUES('','$t1','$t2')";
		$query_run=mysqli_query($con,$query);
	?>

	
	
	
	
	
	
	
	
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>