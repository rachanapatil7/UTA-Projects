<!DOCTYPE html>
<html>
<head>
	<title>Buy From Us</title>
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
		<a href="Homepage1.php">Inicio</a>    <a href="AboutUs.php">Quienes Somos</a>    <a href="Blog.html">Blog</a>    <a href="SignUp.php">Registrate</a>    <a href="ContactUs.php">Contacto</a>    <a href="Login1.php">Iniciar Sesion</a>    <a href="BuyFromUs.php">Comprar Boletos</a> 

		</nav></pre>
	</header>  
	<img src="images1/bannercboleto.jpg" alt="pic" class="imall">

	<div class="bfu_container">
		<div class="column" id="bfu1">
			<img src="images1/minibaner4.jpg" align="pic" class="bu" >
		</div>
		<div class="column">
			<h4>NO PERDAMOS LA FE</h4>
			<strong>$300</strong>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			<i class="fas fa-star" id="star"></i><i class="fas fa-star" id="star" ></i><i class="fas fa-star" id="star" ></i><i class="fas fa-star" id="star"></i><i class="fas fa-star" id="star" ></i>(74 Rating)
			<br>
			<div>
				<p>ila fe no se puede perder JAMAS! Es imprescrindible para todo en nuestras vidas,poco a poco las cosa iran</p>
				<p>Numero de Entradas</p>


			<form action="BFU2.php" method="POST" name="buy">
					<input type="number" name="bfu" min="1" max="100" step="1"><br><br>
					<input type="submit" name="add" value="Comprar" class="btn"><i class="fas fa-shopping-cart"></i>
			</form>



			</div>
		</div>
	</div>

	<div class="bfu1_container">
		<div class="column">
			<input type="button" name="" value="DESCRIPCION" class="btn1">
		</div>
		<div class="column">
			<input type="button" name="" value="ENCARGADOS" class="btn1">
		</div>
		<div class="column">
			<input type="button" name="" value="PATROCINANTES" class="btn1">
		</div>
		<div style="clear:both;">&nbsp;</div>
		<div id="buy">
				Recin he comenzado a leer un libro cuyo mensaje principle es aprender a buscar ese also mejortodos los dias. El libro esta escrito por una persona que vive con diabetes tipo 1 y nos presentt como los adelantos eb tratamientos y tecnologia. aunque no han curado su condicion, dia tras dia mejoran su calidad de vida.

				Busquemos siempre algo en nuestors vidas, mantengamos el desco de progressar, de educmaos mas acerca de la condicion de nuestros hijos y veras como poco a poco comenzaremos a entenderia mejor.
		</div>

			
	</div>

		<footer>
		<div>
			<i class="far fa-paper-plane"></i>
  			Registrese para recibir un
  			<input type="email" name="email" value="" class="f1"><input type="submit" value="Subscribr" class="f2"><br>
		</div>
  		<div class="foo">
  			boletin
  		</div>
	</footer><br><br>
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
		
		

	$m=$_POST['bfu'];
	$p="NO PERDAMOS LA FE";
	


$sql="INSERT INTO buy(product,quantity) VALUES ('$m','$p')";
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