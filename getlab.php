<?php
$con=mysqli_connect("us-cdbr-east-02.cleardb.com","b8293ab7f22cc5","9398b6ea") or die("Unable to connect!");
	mysqli_select_db($con,"heroku_da380dfb3ec7262");
if(!empty($_POST["test_id"])) 
{
$query =mysqli_query($con,"SELECT * FROM assign WHERE test_id = '" . $_POST["test_id"] . "'");
?>
<option value="" disabled selected>-Select Lab-</option>
<?php
while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row["lab"]; ?>"><?php echo $row["lab"]; ?></option>
<?php
}
}
?>
