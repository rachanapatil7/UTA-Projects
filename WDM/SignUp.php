
<!DOCTYPE html>
<head>
	<title>SignUp</title>
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css" media="screen and (max-width:480px) "/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script type="text/javascript" src="SCRIPT/script.js"></script>
</head>
<body>
	<header>
		<div class="column"><img src="images1/logo-blanco.png" alt="pic" class="logo"></div>
		<div class="column" id="c2"><strong>LEANEVENTOS</strong></div>
		<pre><nav class="na">
		<a href="Homepage1.php">Inicio</a>    <a href="AboutUs.php">Quienes Somos</a>    <a href="http://rachananpatil.uta.cloud/lean-event/">Blog</a>    <a href="SignUp.php" class="active">Registrate</a>    <a href="ContactUs.php">Contacto</a>    <a href="Login1.php">Iniciar Sesion</a>    <a href="BuyFromUs.php">Comprar Boletos</a> 

	</nav></pre>
	</header> 
	<div class="container">
		<div class="text-block1">
			<h1>REGISTRATE</h1>
	    	<p>INICIO REGISTRATE </p>
		</div>
	</div>                                                  
<img src="images1/bannerregistro.jpg" alt="pic" class="imall">
	<br>
	<br>
	<br>
	<br>
	<br>

<center>
	<div class="sign_up">
		<h4>Elija el tipo de usuario para registrarse</h4><hr>

			<div class="column" id="su">
				<button id="modalBtn" class="button">Como individual</button>
			</div>
			<div class="column" id="su">
				<button id="modalBtn2" class="button">Como Negocio o Fundacion</button>
			</div>
			<div class="column" id="su">
			<button id="modalBtn3" class="button">Como agente LEAN</button>
			</div>
	</div>
</center>


<div id="simpleModal" class="modal">
	<div class="modal-content">
		<span class="close">&times;</span>
		<center>
			<form action="SignUp.php" method="post" name="isform" id="f_isf" onsubmit="return validate()">
				<h5 align="left">Registro Individual</h5><hr>
				<div class="column" id="isf1">
					<h5>Correo</h5>
					<input type="text" name="mail" value="" placeholder="Correo">
					

				</div>
		  		<div class="column" id="isf2">
		  			<h5>Contrasena</h5>
					<input type="text" name="pass" value="" placeholder="Contrasena">
					
		  		</div>
		  		<!--<div style="clear:both;">&nbsp;</div>-->
		  		<div class="column" id="isf3">
					<h5>Nombre</h5>
					<input type="text" name="fname" value="" placeholder="Nombre">
				</div>
		  		<div class="column" id="isf4">
		  			<h5>Apellido</h5>
					<input type="text" name="lname" value="" placeholder="Apellido">
		  		</div>
		  		<div style="clear:both;">&nbsp;</div>
		  		<div id="isf5">
		  			<h5>Direccion</h5>
		        	<input type="text" name="address" value="" placeholder="Direccion">
		        </div>
		        <div id="isf6">
		  			<h5>Ciudad</h5>
					<input type="text" name="city" value="" placeholder="Ciudad">
		  		</div>
		  		
		  		<div class="column" id="isf7">
		  			<h5>Estado</h5>
					<select id="states" name="sts">
						<option value="state">state</option>
		  				<option value="state1">state1</option>
		  				<option value="state2">state2</option>
						<option value="state3">state3</option>
						<option value="state4">state4</option>
					</select>
		  		</div>
		  		<div class="column" id="isf8">
		  			<h5>Codigo Postal</h5>
		  			<input type="text" name="postal" value="">
		  		</div>
		  		<div class="clear">&nbsp;</div>
		  		<div id="isf9"><input type="submit" name="inserti" value="Registrarse" class="button" onclick="return validate()"/>
		  		</div><hr>
		  		<div class="clear">&nbsp;</div>
		  		<div id="isf10" align="right"><input type="submit" value="Cerrar" class="button">
		  		</div>
	  		
	        </form>
	     </center>
	</div>
</div>

<div id="simpleModal2" class="modal">
	<div class="modal-content">
		<span class="close2">&times;</span>
<center>
			<form action="SignUp.php" method="post" name="isform2" id="f_isf" onsubmit="return validate2()">
				<h5 align="left">Registro Individual</h5><hr>
				<div class="column" id="isf1">
					<h5>Correo</h5>
					<input type="text" name="mail" value="" placeholder="Correo">
					

				</div>
		  		<div class="column" id="isf2">
		  			<h5>Contrasena</h5>
					<input type="text" name="pass" value="" placeholder="Contrasena">
					
		  		</div>
		  		<!--<div style="clear:both;">&nbsp;</div>-->
		  		<div class="column" id="isf3">
					<h5>Nombre</h5>
					<input type="text" name="fname" value="" placeholder="Nombre">
				</div>
		  		<div class="column" id="isf4">
		  			<h5>Apellido</h5>
					<input type="text" name="lname" value="" placeholder="Apellido">
		  		</div>
		  		<div style="clear:both;">&nbsp;</div>
		  		<div id="isf5">
		  			<h5>Direccion</h5>
		        	<input type="text" name="address" value="" placeholder="Direccion">
		        </div>
		        <div id="isf6">
		  			<h5>Ciudad</h5>
					<input type="text" name="city" value="" placeholder="Ciudad">
		  		</div>
		  		
		  		<div class="column" id="isf7">
		  			<h5>Estado</h5>
					<select id="states" name="sts">
						<option value="state">state</option>
		  				<option value="state1">state1</option>
		  				<option value="state2">state2</option>
						<option value="state3">state3</option>
						<option value="state4">state4</option>
					</select>
		  		</div>
		  		<div class="column" id="isf8">
		  			<h5>Codigo Postal</h5>
		  			<input type="text" name="postal" value="">
		  		</div>
		  		<div class="clear">&nbsp;</div>
		  		<div id="isf9"><input type="submit" name="insertb" value="Registrarse" class="button" onclick="return validate2()"/>
		  		</div><hr>
		  		<div class="clear">&nbsp;</div>
		  		<div id="isf10" align="right"><input type="submit" value="Cerrar" class="button">
		  		</div>
	  		
	        </form>
	     </center>

</div>
</div>

<div id="simpleModal3" class="modal">
	<div class="modal-content">
		<span class="close3">&times;</span>

	<center>
			<form action="SignUp.php" method="post" name="isform3" id="f_isf" onsubmit="return validate3()">
				<h5 align="left">Registro Individual</h5><hr>
				<div class="column" id="isf1">
					<h5>Correo</h5>
					<input type="text" name="mail" value="" placeholder="Correo">
					

				</div>
		  		<div class="column" id="isf2">
		  			<h5>Contrasena</h5>
					<input type="text" name="pass" value="" placeholder="Contrasena">
					
		  		</div>
		  		<!--<div style="clear:both;">&nbsp;</div>-->
		  		<div class="column" id="isf3">
					<h5>Nombre</h5>
					<input type="text" name="fname" value="" placeholder="Nombre">
				</div>
		  		<div class="column" id="isf4">
		  			<h5>Apellido</h5>
					<input type="text" name="lname" value="" placeholder="Apellido">
		  		</div>
		  		<div style="clear:both;">&nbsp;</div>
		  		<div id="isf5">
		  			<h5>Direccion</h5>
		        	<input type="text" name="address" value="" placeholder="Direccion">
		        </div>
		        <div id="isf6">
		  			<h5>Ciudad</h5>
					<input type="text" name="city" value="" placeholder="Ciudad">
		  		</div>
		  		
		  		<div class="column" id="isf7">
		  			<h5>Estado</h5>
					<select id="states" name="sts">
						<option value="state">state</option>
		  				<option value="state1">state1</option>
		  				<option value="state2">state2</option>
						<option value="state3">state3</option>
						<option value="state4">state4</option>
					</select>
		  		</div>
		  		<div class="column" id="isf8">
		  			<h5>Codigo Postal</h5>
		  			<input type="text" name="postal" value="">
		  		</div>
		  		<div class="clear">&nbsp;</div>
		  		<div id="isf9"><input type="submit" name="insertl" value="Registrarse" class="button" onclick="return validate3()"/>
		  		</div><hr>
		  		<div class="clear">&nbsp;</div>
		  		<div id="isf10" align="right"><input type="submit" value="Cerrar" class="button">
		  		</div>
	  		
	        </form>
	     </center>

</div></div>




<br><br><br><br><br><br><br><br><br><br><br><br>                                                     
	<center>LEAN EN LAS REDES SOCIALES</center><br>
	<center>
		<span  style="font-size: 2em; color: yellow">
  			<i class="fab fa-twitter"></i>
		</span>
		<span style="font-size: 2em; color: yellow">
  			<i class="fab fa-facebook-f"></i>
		</span>
		<span style="font-size: 2em; color: yellow">
  			<i class="fab fa-instagram"></i>
		</span>
	</center><br><br><br><br>
	<center id="hpf">
	Copyright &copy; 2019 All rights reserved! This web is made with <i class="far fa-heart"></i> by Diaz Apps
	</center>
<script src="SCRIPT/script.js">
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

	if(isset($_POST['inserti'])){
		
		$r="indivi";

	$m=$_POST['mail'];
	$p=$_POST['pass'];
	$f=$_POST['fname'];
	$l=$_POST['lname'];
	$a=$_POST['address'];
	$c=$_POST['city'];
	$s=$_POST['sts'];
	$po=$_POST['postal'];


$sql="INSERT INTO individual(Mail, password, fname,lname,address,city,states,postal,role ) VALUES ('$m','$p','$f','$l','$a','$c','$s','$po','$r')";
var_dump($sql);



    $result=mysqli_query($conn,$sql);

//var_dump($result);
if ($result) {
    echo $success="New record created successfully";
} else {
    echo $failure="Data not inserted".mysql_error();
}

}

if(isset($_POST['insertb'])){
		
		$r="bussiness";

	$m=$_POST['mail'];
	$p=$_POST['pass'];
	$f=$_POST['fname'];
	$l=$_POST['lname'];
	$a=$_POST['address'];
	$c=$_POST['city'];
	$s=$_POST['sts'];
	$po=$_POST['postal'];


$sql="INSERT INTO individual(Mail, password, fname,lname,address,city,states,postal,role ) VALUES ('$m','$p','$f','$l','$a','$c','$s','$po','$r')";
var_dump($sql);



    $result=mysqli_query($conn,$sql);

//var_dump($result);
if ($result) {
    echo $success="New record created successfully";
} else {
    echo $failure="Data not inserted".mysql_error();
}

}

if(isset($_POST['insertl'])){
		
		$r="lean_staff";

	$m=$_POST['mail'];
	$p=$_POST['pass'];
	$f=$_POST['fname'];
	$l=$_POST['lname'];
	$a=$_POST['address'];
	$c=$_POST['city'];
	$s=$_POST['sts'];
	$po=$_POST['postal'];


$sql="INSERT INTO individual(Mail, password, fname,lname,address,city,states,postal,role ) VALUES ('$m','$p','$f','$l','$a','$c','$s','$po','$r')";
var_dump($sql);



    $result=mysqli_query($conn,$sql);

//var_dump($result);
if ($result) {
    echo $success="New record created successfully";
} else {
    echo $failure="Data not inserted".mysql_error();
}

}
mysqli_close($conn);

?>