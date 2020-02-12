<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css" media="screen and (max-width:480px) "/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>


	<header>
		<div class="column" id="c1"><img src="images1/logo-blanco.png" alt="pic" class="logo"></div>
		<div class="column" id="c2"><strong>LEANEVENTOS</strong></div>
		<pre><nav class="na">
		<a href="Homepage1.php">Inicio</a>    <a href="AboutUs.php">Quienes Somos</a>    <a href="http://rachananpatil.uta.cloud/lean-event/">Blog</a>    <a href="SignUp.php">Registrate</a>    <a href="ContactUs.php">Contacto</a>    <a href="Login1.php" class="active">Iniciar Sesion</a>    <a href="BuyFromUs.php">Comprar Boletos</a> 

	</nav></pre>
	</header>                                                    
	<br><br>
	<div class="container">
		<img src="images1/bannerlogin.jpg" alt="pic" class="imall">
		<div class="text-block1">
			<h1>INICIAR SESION</h1>
	    	<p>INICIO INICIAR SESION </p>
		</div>
	</div>

	
	<br><br><br><br><br>
	<center>
		<form action="#" method="POST" id="l1">
			<h4>Iniciar Sesion</h4>
			<div class="column" id="l2">
				<h5>Nombre de Usuario</h5>
				<input type="text" name="uname" value="" placeholder="Nombre de Usuario o Correo">
			</div>
	  		<div class="column" id="l3">
	  			<h5>Contrasena</h5>
				<input type="password" name="pass" value="" placeholder="Contrasena">
	  		</div>
	  		<div style="clear:both;">&nbsp;</div>
	  		<div id="l4"><a href="#" id="modalBtn">Olvido su contrasena?</a></div>

	  		<div style="clear:both;">&nbsp;</div>
	  		<div id="cu6" align="center">
		<input type="submit" name="enter" value="Entra" class="button" >
	  		</div>

		
	</form></center>

<div id="simpleModal" class="modal">
	<div class="modal-content">
		<span class="close">&times;</span>
		<center>
			
			<div class="pop-up"	>
				<div id="isf2">Recuperar su Contrasena</div><hr><br>
					<div id="isf3">Correo</div><br>
						<input type="text" name="" placeholder="Correo"><br><br><hr><br>
							<div id="clo">
								<button class="clo1">Cerrar</button>	
								<button class="button">Enviar</button>
							</div>
					</div>

	    </center>
	</div>
</div>

	<br><br><br><br><br>
<center>LEAN EN LAS REDES SOCIALES</center><br>
	<center>
		<span  class="fontawesome">
  			<i class="fab fa-twitter"></i>
		</span>
		<span class="fontawesome">
  			<i class="fab fa-facebook-f"></i>
		</span>
		<span class="fontawesome">
  			<i class="fab fa-instagram"></i>
		</span>
	</center><br><br><br><br>
	<center id="hpf">
	Copyright &copy; 2019 All rights reserved! This web is made with <i class="far fa-heart"></i> by Diaz Apps
	</center>
	<script src="SCRIPT/script.js"></script>
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

if(isset($_POST['enter'])){

	$uname=$_POST['uname'];
	$pass=$_POST['pass'];

$sql="SELECT * FROM `individual` WHERE Mail='$uname' and password='$pass'";
var_dump($sql);

$result=mysqli_query($conn,$sql);
var_dump($result);
$count=mysqli_num_rows($result);
/*if($count==1){
	echo "Login success";
	header("location:IndiviHome.php");
}
else{
	echo "Enter proper credentials";
	header("refresh:2;url=Login1.php");
}
*/
$row = mysqli_fetch_array($result);

if($row['Mail']==$uname && $row['password']==$pass && $row['role']=="indivi"){
	echo "Login success";
	?>
	<script>window.location.href = "IndiviHome.php";</script>
	
<?php 
//header("refresh:2;url=IndiviHome.php");
	//header("location:IndiviHome.php");
}
else if($row['Mail']==$uname && $row['password']==$pass && $row['role']=="bussiness"){
	echo "Login success";
	?>
	<script>window.location.href = "BusinessHome.php";</script>
	
<?php
	//header("refresh:2;url=BusinessHome.php");
}
else if($row['Mail']==$uname && $row['password']==$pass && $row['role']=="lean_staff"){
	echo "Login success";
	?>
	<script>window.location.href = "AgentLeanHome.php";</script>
	
<?php
	//header("refresh:2;url=AgentLeanHome.php");
}

else{
	echo "Enter proper credentials";
	header("refresh:4;url=Login1.php");
}


}

mysqli_close($conn);

?>	