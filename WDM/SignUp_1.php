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
//	echo "Connected";
}




if ($_POST) 
{
	$errors=array();

    if (empty($_POST["mail"])) {
        $errors['mail1'] = "Mail cannot be empty";
    }

    if (!preg_match("/^[A-Za-z0-9.]+@[A-Za-z0-9.]+$/",$_POST["mail"])) {
    	$errors['mail2'] = "Enter mail in a proper format";
    }

	if (empty($_POST["pass"])) {
        $errors['pass1'] = "password cannot be empty";
    }

    if(strlen($_POST["pass"])<8)
    {
    	$errors['pass2'] = " password must be atleast 8 charcaters";
    }

     if (empty($_POST["fname"])) {
      $errors['fname1'] = "First Name cannot be empty";
    }

     if(strlen($_POST["fname"])<2)
    {
    	$errors['fname2'] = " Your first name must be atleast two characters long";
    }

     if (empty($_POST["lname"])) {
       $errors['lname1'] = "Last Name cannot be empty";
    }

    if(strlen($_POST["lname"])<2)
    {
    	$errors['lname2'] = " Your last name must be atleast two characters long";
    }

      if (empty($_POST["address"])) {
        $errors['address1'] = "address cannot be empty";
    }

     if (empty($_POST["city"])) {
        $errors['city1'] = "City cannot be empty";
    }
   
    if (empty($_POST["postal"])) {
        $errors['postal1'] = "postal code cannot be empty";
    }

}






mysqli_close($conn);

	


function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}



?>

<!DOCTYPE html>
<head>
	<title>SignUp</title>
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css" media="screen and (max-width:480px) "/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body>
	<header>
		<div class="column"><img src="images1/logo-blanco.png" alt="pic" class="logo"></div>
		<div class="column" id="c2"><strong>LEANEVENTOS</strong></div>
		<pre><nav class="na">
		<a href="Homepage1.php">Inicio</a>    <a href="AboutUs.php">Quienes Somos</a>    <a href="http://rachananpatil.uta.cloud/lean-event/">Blog</a>    <a href="SignUp_1.php" class="active">Registrate</a>    <a href="ContactUs.php">Contacto</a>    <a href="Login1.php">Iniciar Sesion</a>    <a href="BuyFromUs.php">Comprar Boletos</a> 

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
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="isform" id="f_isf">
				<h5 align="left">Registro Individual</h5><hr>

				<div class="column" id="isf1">
					<h5>Correo</h5>
					<input type="text" name="mail" value="<?php if(isset($_POST['mail'])) echo $_POST['mail']; ?>" placeholder="Correo">
					<span class="error">* <?php if(isset($errors['mail1'])) echo $errors['mail1'];?></span>
					<span class="error">* <?php if(isset($errors['mail2'])) echo $errors['mail2'];?></span>
					<br>
				</div>

		  		<div class="column" id="isf2">
		  			<h5>Contrasena</h5>
					<input type="text" name="pass" value="<?php if(isset($_POST['pass'])) echo $_POST['pass']; ?>" placeholder="Contrasena">
					<span class="error">* <?php if(isset($errors['pass1'])) echo $errors['pass1'];?></span>
					<span class="error">* <?php if(isset($errors['pass2'])) echo $errors['pass2'];?></span>
		  		</div>

		  		<!--<div style="clear:both;">&nbsp;</div>-->
		  		<div class="column" id="isf3">
					<h5>Nombre</h5>
					<input type="text" name="fname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>" placeholder="Nombre">
					<span class="error">* <?php if(isset($errors['fname1'])) echo $errors['fname1'];?></span>
					<span class="error">* <?php if(isset($errors['fname2'])) echo $errors['fname2'];?></span>
				</div>
		  		<div class="column" id="isf4">
		  			<h5>Apellido</h5>
					<input type="text" name="lname" value="<?php if(isset($_POST['lname'])) echo $_POST['lname']; ?>" placeholder="Apellido">
					<span class="error">* <?php if(isset($errors['lname1'])) echo $errors['lname1'];?></span>
					<span class="error">* <?php if(isset($errors['lname2'])) echo $errors['lname2'];?></span>
		  		</div>
		  		<div style="clear:both;">&nbsp;</div>
		  		<div id="isf5">
		  			<h5>Direccion</h5>
		        	<input type="text" name="address" value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>" placeholder="Direccion">
		        	<span class="error">* <?php if(isset($errors['address1'])) echo $errors['address1'];?></span>
		        </div>
		        <div id="isf6">
		  			<h5>Ciudad</h5>
					<input type="text" name="city" value="<?php if(isset($_POST['city'])) echo $_POST['city']; ?>" placeholder="Ciudad">
					<span class="error">* <?php if(isset($errors['city1'])) echo $errors['city1'];?></span>
		  		</div>
		  		
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
		  			<h5>Codigo Postal</h5>
		  			<input type="text" name="postal" value="<?php if(isset($_POST['postal'])) echo $_POST['postal']; ?>">
		  			<span class="error">* <?php if(isset($errors['postal1'])) echo $errors['postal1'];?></span>
		  		</div>
		  		<div class="clear">&nbsp;</div>
		  		<div id="isf9"><input type="submit" value="Registrarse" class="button" onclick="return validate()"/>
		  		</div><hr>
		  		<div class="clear">&nbsp;</div>
		  		<div id="isf10" align="right"><input type="submit" name="inserti" value="Cerrar" class="button">
		  		</div>
	  		
	        </form>
	     </center>
	</div>
</div>

<div id="simpleModal2" class="modal">
	<div class="modal-content">
		<span class="close2">&times;</span>
<center>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="f_isf" name="isform2" >
			<h5 align="left">Registro Negocio o Fundacion</h5><hr>
			<div class="column" id="isf1">
				<h5>Correo</h5>
				<input type="text" name="mail" value="<?php if(isset($_POST['mail'])) echo $_POST['mail']; ?>" placeholder="Correo">
				<span class="error">* <?php if(isset($errors['mail1'])) echo $errors['mail1'];?></span>
					<span class="error">* <?php if(isset($errors['mail2'])) echo $errors['mail2'];?></span>
					<br>
			</div>
	  		<div class="column" id="isf2">
	  			<h5>Contrasena</h5>
				<input type="text" name="pass" value="<?php if(isset($_POST['pass'])) echo $_POST['pass']; ?>" placeholder="Contrasena">
				<span class="error">* <?php if(isset($errors['pass1'])) echo $errors['pass1'];?></span>
					<span class="error">* <?php if(isset($errors['pass2'])) echo $errors['pass2'];?></span>
	  		</div>
	  		<!--<div style="clear:both;">&nbsp;</div>-->
	  		<div class="column" id="isf3">
				<h5>Nombre</h5>
				<input type="text" name="fname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>" placeholder="Nombre">
				<span class="error">* <?php if(isset($errors['fname1'])) echo $errors['fname1'];?></span>
					<span class="error">* <?php if(isset($errors['fname2'])) echo $errors['fname2'];?></span>
			</div>
	  		<div class="column" id="isf4">
	  			<h5>Apellido</h5>
				<input type="text" name="lname" value="<?php if(isset($_POST['lname'])) echo $_POST['lname']; ?>" placeholder="Apellido">
				<span class="error">* <?php if(isset($errors['lname1'])) echo $errors['lname1'];?></span>
					<span class="error">* <?php if(isset($errors['lname2'])) echo $errors['lname2'];?></span>
	  		</div>
	  		<div style="clear:both;">&nbsp;</div>
	  		<div id="isf5">
	  			<h5>Direccion</h5>
	        	<input type="text" name="address" value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>" placeholder="Direccion">
	        	<span class="error">* <?php if(isset($errors['address1'])) echo $errors['address1'];?></span>
	        </div>
	        <div id="isf6">
	  			<h5>Ciudad</h5>
				<input type="text" name="city" value="<?php if(isset($_POST['city'])) echo $_POST['city']; ?>" placeholder="Ciudad">
				<span class="error">* <?php if(isset($errors['city1'])) echo $errors['city1'];?></span>
	  		</div>
	  		
	  		<div class="column" id="isf7">
	  			<h5>Estado</h5>
				<select id="states" name="sts">
					<option value="state">Escoger...</option>
	  				<option value="state1">state1</option>
	  				<option value="state2">state2</option>
					<option value="state3">state3</option>
					<option value="state4">state4</option>
				</select>
	  		</div>
	  		<div class="column" id="isf8">
	  			<h5>Codigo Postal</h5>
	  			<input type="text" name="postal" value="<?php if(isset($_POST['postal'])) echo $_POST['postal']; ?>">
	  			<span class="error">* <?php if(isset($errors['postal1'])) echo $errors['postal1'];?></span>
	  		</div>
	  		<div class="clear">&nbsp;</div>
	  		<div>
	  			<input type="radio" name="type_bus" value="1"><strong>Tipo de negocio 1</strong>
	  			<input type="radio" name="type_bus" value="2" checked><strong>Tipo de negocio 2</strong>
	  			<input type="radio" name="type_bus" value="3"><strong>Tipo de negocio 3</strong>
	  		</div>
	  		<div class="clear">&nbsp;</div>
	  	<div id="isf9"><input type="submit" name="insertb" value="Registrarse" class="button" onclick="return validate2()"/>
	  		</div><hr>
	  		
	  		<div id="isf10" align="right"><input type="submit" value="Cerrar">
	  		</div>
  		
        </form>
    </center>

</div>
</div>

<div id="simpleModal3" class="modal">
	<div class="modal-content">
		<span class="close3">&times;</span>

	<center>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="f_isf" name="isform3" >
			<h5 align="left">Registro de Agent LEAN</h5><hr>
			<div class="column" id="isf1">
				<h5>Correo</h5>
				<input type="text" name="mail" value="<?php if(isset($_POST['mail'])) echo $_POST['mail']; ?>" placeholder="Correo">
				<span class="error">* <?php if(isset($errors['mail1'])) echo $errors['mail1'];?></span>
					<span class="error">* <?php if(isset($errors['mail2'])) echo $errors['mail2'];?></span>
					<br>

			</div>
	  		<div class="column" id="isf2">
	  			<h5>Contrasena</h5>
				<input type="text" name="pass" value="<?php if(isset($_POST['pass'])) echo $_POST['pass']; ?>" placeholder="Contrasena">
				<span class="error">* <?php if(isset($errors['pass1'])) echo $errors['pass1'];?></span>
					<span class="error">* <?php if(isset($errors['pass2'])) echo $errors['pass2'];?></span>
	  		</div>
	  		<!--<div style="clear:both;">&nbsp;</div>-->
	  		<div class="column" id="isf3">
				<h5>Nombre</h5>
				<input type="text" name="fname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>" placeholder="Nombre">
				<span class="error">* <?php if(isset($errors['fname1'])) echo $errors['fname1'];?></span>
					<span class="error">* <?php if(isset($errors['fname2'])) echo $errors['fname2'];?></span>
			</div>
	  		<div class="column" id="isf4">
	  			<h5>Apellido</h5>
				<input type="text" name="lname" value="<?php if(isset($_POST['lname'])) echo $_POST['lname']; ?>" placeholder="Apellido">
				<span class="error">* <?php if(isset($errors['lname1'])) echo $errors['lname1'];?></span>
					<span class="error">* <?php if(isset($errors['lname2'])) echo $errors['lname2'];?></span>
	  		</div>
	  		<div style="clear:both;">&nbsp;</div>
	  		<div id="isf5">
	  			<h5>Direccion</h5>
	        	<input type="text" name="address" value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>" placeholder="Direccion">
	        	<span class="error">* <?php if(isset($errors['address1'])) echo $errors['address1'];?></span>
	        </div>
	        <div id="isf6">
	  			<h5>Ciudad</h5>
				<input type="text" name="city" value="<?php if(isset($_POST['city'])) echo $_POST['city']; ?>" placeholder="Ciudad">
				<span class="error">* <?php if(isset($errors['city1'])) echo $errors['city1'];?></span>
	  		</div>
	  		
	  		<div class="column" id="isf7">
	  			<h5>Estado</h5>
				<select id="states" name="sts">
					<option value="state">Escoger...</option>
	  				<option value="state1">state1</option>
	  				<option value="state2">state2</option>
					<option value="state3">state3</option>
					<option value="state4">state4</option>
				</select>
	  		</div>
	  		<div class="column" id="isf8">
	  			<h5>Codigo Postal</h5>
	  			<input type="text" name="postal" value="<?php if(isset($_POST['postal'])) echo $_POST['postal']; ?>">
	  			<span class="error">* <?php if(isset($errors['postal1'])) echo $errors['postal1'];?></span>
	  		</div>
	  		<div class="clear">&nbsp;</div>
	  	<div id="isf9"><input type="submit" name="insertl" value="Registrarse" class="button" onclick="return validate3()"/>
	  		</div><hr>
	  		<div class="clear">&nbsp;</div>
	  		<div id="isf10" align="right"><input type="submit" value="Cerrar">
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
<script src="practice.js">
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

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
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



    $result=mysqli_query($conn,$sql);

var_dump($result);
if ($result) {
    echo $success="New record created successfully";
} else {
   // echo $failure="Data not inserted".mysqli_error();
}

}

if($_SERVER['REQUEST_METHOD']=='POST'){
		
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




    $result=mysqli_query($conn,$sql);


if ($result) {
    echo $success="New record created successfully";
} else {
   // echo $failure="Data not inserted".mysqli_error();
}

}

if($_SERVER['REQUEST_METHOD']=='POST'){
		
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



    $result=mysqli_query($conn,$sql);


if ($result) {
    echo $success="New record created successfully";
} else {
   // echo $failure="Data not inserted".mysqli_error();
}

}
mysqli_close($conn);

?>