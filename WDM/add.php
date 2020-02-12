<!DOCTYPE html></!DOCTYPE html>
<html>
<head>
	<title>Add Event</title>
	<style type="text/css">
		#for1{
			display: block;
		}
	</style>
</head>
<body>
	<center>
		<form action="add.php" method="post" name="" id="for1" enctype="multipart/form-data">
			<h5>Add Event</h5>

			<div>
			<label align="left">Image:</label>
			<input type="file" name="imageupload" />
			</div>
			
		<div style="clear:both;">&nbsp;</div>
			<div>
			<label align="left">Details:</label>
			<textarea name="det">Details</textarea>
			</div>
<div style="clear:both;">&nbsp;</div>
			<div>
			<label align="left">place:</label>
			<input type="text" name="pl">
			</div>
<div style="clear:both;">&nbsp;</div>
			<div>
			<label align="left">Date:</label>
			<input type="date" name="da">
			</div>
<div style="clear:both;">&nbsp;</div>
			<div>
				<input type="submit" name="add">
			</div>
		</form>
	</center>
</body>
</html>



<?php

$servername = "utacloud";
$username = "rachanan_rachana";
$password = "rachananpatil";
$dbname = "rachanan_leanevent";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
	echo "Connected";
}



	if(isset($_POST['add'])){

	$image=$_FILES['imageupload']['name'];
	$tempname=$_FILES['imageupload']['tmp_name'];
	$folder="images1/".$image;	
	$details=$_POST['det'];
	$place=$_POST['pl'];
	$date=$_POST['da'];

$sql="INSERT INTO `listofevents`( `.`, `details`, `place`, `dateof`) VALUES ('$folder','$details','$place','$date')";
var_dump($sql);
	$result=mysqli_query($conn,$sql);
	var_dump($result);
	if($result){
		echo $success="New Record inserted";
		echo "<img src='$folder' height='100' width='100'/>";
		header("refresh:5;url=List_of_Events_1.php");
	}
	else{
		echo $failure="Not inserted".mysqli_error($conn);	
	}

}





?>