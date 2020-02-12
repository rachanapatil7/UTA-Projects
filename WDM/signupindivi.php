<!Doctype html>

<head>
	<title>Individual Sign_Up</title>
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css">
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css" media="screen and (max-width:480px) "/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body>
	<center>
		<form  method="post" name="isform" id="f_isf" onsubmit="return validateForm()" >
			<h5 align="left">Registro Individual</h5><hr>
			<div class="column" id="isf1">
				<label><strong>Correo</strong></label>
				<input type="text" name="mail" value="" placeholder="Correo" id="i1">
				<span id="error-mail"></span>
			</div>
			
	  		<div class="column" id="isf2">
	  			<label><strong>Contrasena</strong></label>
				<input type="password" name="pass" value="" placeholder="Contrasena">
				<span id="error-pass"></span>
			</div>

	  		<div style="clear:both;">&nbsp;</div>

	  		<div class="column" id="isf3">
				<label><strong>Nombre</strong></label>
				<input type="text" name="fname" value="" placeholder="Nombre">
				<span id="error-fname"></span>
			
			</div>
	  		<div class="column" id="isf4">
	  			<label><strong>Apellido</strong></label>
				<input type="text" name="lname" value="" placeholder="Apellido">
				<span id="error-lname"></span>
			
	  		</div>
	  		
	  		<div style="clear:both;">&nbsp;</div>

	  		<div id="isf5">
	  			<label><strong>Direccion</strong></label>
	        	<input type="text" name="address" value="" placeholder="Direccion">
	        	<span id="error-address"></span>
	        
	        </div>

	        <div style="clear:both;">&nbsp;</div>

	        <div id="isf6">
	  			<label><strong>Ciudad</strong></label>
				<input type="text" name="city" value="" placeholder="Ciudad">
				<span id="error-city"></span>

	  		</div>

	  		<div style="clear:both;">&nbsp;</div>
	  		
	  		<div class="column" id="isf7">
	  			<h5>Estado</h5>
				<select id="states" name="sts" >
					<option value="state">Escoger...</option>
	  				<option value="state1">state1</option>
	  				<option value="state2">state2</option>
					<option value="state3">state3</option>
					<option value="state4">state4</option>
				</select>
	  		</div>

			<div class="column" id="isf8">
	  			<label><strong>Codigo Postal</strong></label>
	  			<input type="text" name="postal" value="">
	  		</div>

	  		<div class="clear">&nbsp;</div>

	  		<div id="isf9"><input type="submit" name="insert" value="Registrarse" class="button" onclick="return validateForm()"/>
	  		</div><hr>
	  		<div class="clear">&nbsp;</div>
	  		<div id="isf10" align="right"><button type="button"  class="button">Cerrar</button>
	  		</div>
  		
        </form>
    </center>
 
<script type="text/javascript" >
	
      
	 function validateForm(){ 

	 	var a= document.forms["isform"]["mail"].value;
	  var b= document.forms["isform"]["pass"].value;
	  var c= document.forms["isform"]["fname"].value;
	  var d= document.forms["isform"]["lname"].value;
	  var e= document.forms["isform"]["address"].value;
	  var f= document.forms["isform"]["city"].value;
	  var g= document.forms["isform"]["postal"].value;
	  var a1=document.getElementById('i1').value;
	  var mailregex = /^[A-Za-z0-9]+@[A-Za-z0-9]+$/;

 		if(a==null||a==""){
 			document.getElementById('error-mail').innerHTML="Mail field canot be empty *";
 			return false;
 		}


	 	
	 			 if (!mailregex.test(a)) {
        document.getElementById('error-mail').innerHTML = "Mail is wrong *";
        	return false;
	 	}
	 	else{
	 		document.getElementById('error-mail').innerHTML = "Mail is correct *";
	 		return false;
	 	}

	  if (b == ""||b==null) {
        document.getElementById('error-pass').innerHTML = "Password field cannot be empty *";
        return false;
    }

     if (c == ""||c==null) {
        document.getElementById('error-fname').innerHTML = "First Name field cannot be empty *";
        return false;
    }

     if (d == ""||d==null) {
        document.getElementById('error-lname').innerHTML = " Last Name field cannot be empty *";
        return false;
    }

     if (e == ""||e==null) {
        document.getElementById('error-address').innerHTML = "Address field cannot be empty *";
        return false;
    }

     if (f == ""||f==null) {
        document.getElementById('error-city').innerHTML = "City field cannot be empty *";
        return false;
    }

     if (g == ""||g==null) {
        document.getElementById('error-postal').innerHTML = "Postal field cannot be empty *";
        return false;
    }

   	
           
}


</script>
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

	if(isset($_POST['insert'])){

	$m=$_POST['mail'];
	$p=$_POST['pass'];
	$f=$_POST['fname'];
	$l=$_POST['lname'];
	$a=$_POST['address'];
	$c=$_POST['city'];
	$s=$_POST['sts'];
	$po=$_POST['postal'];


$sql="INSERT INTO individual(Mail, password, fname,lname,address,city,states,postal ) VALUES ('$m','$p','$f','$l','$a','$c','$s','$po')";
var_dump($sql);



    $result=mysqli_query($conn,$sql);

var_dump($result);
if ($result) {
    echo $success="New record created successfully";
} else {
    echo $failure="Data not inserted".mysql_error();
}




}
mysqli_close($conn);

?>