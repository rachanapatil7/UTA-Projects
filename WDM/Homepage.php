<!DOCTYPE html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css" media="screen and (max-width:480px) "/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<meta name="viewport" content="width=480px, initial-scale=1.0">
<body>

	<header>
		<div class="column"><img src="images1/logo-blanco.png" alt="pic" class="logo"></div>
		<div class="column" id="c2"><strong>LEANEVENTOS</strong></div>
		<pre><nav class="na">
		<a href="Homepage.html" class="active">Inicio</a>    <a href="AboutUs.html">Quienes Somos</a>    <a href="http://rachananpatil.uta.cloud/lean-event/">Blog</a>    <a href="SignUp.html">Registrate</a>    <a href="ContactUs.html">Contacto</a>    <a href="Login.html">Iniciar Sesion</a>    <a href="BuyFromUs.html">Comprar Boletos</a> 

	</nav></pre>
	</header>                                                   
	

<div class="container">
	<img src="images1/bannerlean2.jpg" alt="pic" class="imall">
	<img src="images1/logo-blanco.png" alt="pic" id="img2">
</div>
	<br>
	<br>
	<br>
	<br>
	<br>
<div class="hp3_container">
<strong><div><h2>¿QUÉ HACEMOS?</h2></div></strong>
<center><div><br>
La asociación civil LEAN fue creada con el objetivo de ayudar, a través de acciones concretas, a nuestros conciudadanos en Venezuela ante la grave escasez de medicinas e insumos médicos en que se encuentra el país. Nuestra misión consiste en recolectar ayuda médico sanitaria en delegaciones en España y, a través de agentes de transporte, llevarlos a Venezuela para que otras asociaciones se encarguen de su distribución. De esta manera aportamos nuestro granito de arena ayudando a llevar asistencia humanitaria a Venezuela. Somos una asociación sin fines de lucro, dedicada a la defensa de los Derechos Humanos.
</div></center>
</div>

	<br>
	<br>	
	<br>
	<br>
	<br>
	<br>
	<br>

 <div id="hp4">&emsp;&emsp;&emsp;  478 &emsp;&emsp;&emsp; &emsp;&emsp;&emsp; &nbsp; &emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;            60.000 &emsp;&emsp;&emsp; &emsp; &emsp;&emsp;&emsp; &emsp;   &emsp;&emsp;&emsp; &emsp;&emsp; &emsp;&emsp;&emsp;            45<br>
  &emsp; VOLUNTARIOS &emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; PERSONAS BENEFICIADAS &emsp;&emsp;&emsp; &emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;  ALIADOS</div>

<div class="container">
	<img src="images1/bannerabout2.jpg" alt="pic" class="imall">
	<div class="text-block"> 
	    <h4>"La injusticia, en cualquier parte, es una armenaza a la justicia en todas partes."</h4>
	    <p align="right">martin Luter King</p>
  	</div>
</div>
	
	<br>
	<br>
	<br>
	<br>
	<br>
	
	<center><strong><h2>  ALIADOS  </h2></strong></center>
	<br>
	<div class="log">
		<div class="column" id="logo1">
			<img src="images1/logo1.png" alt="pic">
		</div>
		
		<div class="column" id="logo2">
			<img src="images1/logo2.png" alt="pic">
		</div>

		<div class="column" id="logo3">
			<img src="images1/logo3.png" alt="pic">
		</div>
		<div class="column" id="logo4">
			<img src="images1/logo4.png" alt="pic">
		</div>
	</div>
	<br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br>


	<footer>
		<div>
			<i class="far fa-paper-plane"></i>
  			Registrese para recibir un
  			<input type="email" name="email" value="" class="f1">
  			<input type="submit" name="subs" value="Subscribr" class="f2">
		</div>
  		<div class="foo">
  			boletin
  		</div>
	</footer><br><br>
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

if(isset($_POST["subs"]))
  {
$to_email = $_POST['email'];
var_dump($to_email);
$subject = 'Testing PHP Mail';
$message = 'This mail is sent using the PHP mail function';
$headers = 'From: rachana.n.p.7@gmail.com';
mail($to_email,$subject,$message,$headers);



}


?>