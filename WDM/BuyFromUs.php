<!DOCTYPE html>

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
		<a href="Homepage1.php">Inicio</a>    <a href="AboutUs.php">Quienes Somos</a>    <a href="http://rachananpatil.uta.cloud/lean-event/">Blog</a>    <a href="SignUp.php">Registrate</a>    <a href="ContactUs.php">Contacto</a>    <a href="Login1.php">Iniciar Sesion</a>    <a href="BuyFromUs.php" class="active">Comprar Boletos</a> 

	</nav></pre>
	</header>  
	<div class="container">
	<img src="images1/bannercboleto.jpg" alt="pic" class="imall">
	<div class="text-block1"> 
	    	<h1>COMPRAR BOLETOS</h1>
	    	<p>HOME COMPRAR BOLETOS </p>
  		</div>
	</div>
	<br><br>
<!--	<div class="column" id="bfu1">
		<img src="images1/minibaner4.jpg" class="bu">
		<h3>NO PERDAMOS LA FE</h3>
		<p>$300.00</p>
	</div>
	<div class="column" id="bfu2" >
		<img src="images1/minibaner1.jpg"  class="bu">
		<h3>LA IMPORTANCIA DE LOS ALIMENTOS</h3>
		<p>$300</p>
	</div>
	<div class="column" id="bfu3">
		<img src="images1/minibaner2.jpg"  class="bu">
		<h3>EDUCANDO PARA EL FUTURO</h3>
		<p>Entrade Gratis</p>
	</div>
	<div class="column" id="bfu4" >
		<img src="images1/minibaner3.jpg" class="bu">
		<h3>POR UNA SONRISA DE VIDA</h3>
		<p>$300.00</p>
	</div>
-->

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

$sql="SELECT * FROM buyfromus";
//var_dump($sql);

$result=mysqli_query($conn,$sql);
?>	
<table>

<?php	
echo '<thead><tr><th></th>';
     	echo '			 <th>Rate</th>';
     	echo '			 <th>Description</th></tr></thead>';

 while($row = mysqli_fetch_array($result))

     {

     	echo '
     		<tr>
     		<td>
     	<a href="BFU2.php"><img src="data:image/jpg;base64,'.base64_encode($row['P_image']).'" height="100" width="100"/></a>
     		
     		
     	';

        echo '</td><td>';
        echo $row['P_price'];
        echo '</td><td>';
        echo $row['P_description'];
        echo '</td></tr>';
}

?>

</table>
<?php	

mysqli_close($conn);

?>


	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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



