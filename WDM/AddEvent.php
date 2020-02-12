<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css">
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css" media="screen and (max-width:480px) "/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
</head>
<body>
		<header>
		<div class="column"><img src="images1/logo-blanco.png" alt="pic" class="logo"></div>
		<div class="column" id="c2"><strong>LEANEVENTOS</strong></div>
		<pre><nav class="na">
		<a href="AgentLeanHome.php">Inicio</a>    <a href="List_of_Volunteers.php">Lista de Voluntarios</a>    <a href="List_of_Foundations.php">Liste de Fundaciones</a>    <a href="AddEvent.php" class="active">Eventos</a>    <a href="AgentLeanProfile.php">Agente</a>    

	</nav></pre>
	</header> 
<div class="container">
	<img src="images1/bannerregistro.jpg" alt="pic" class="imall"> 
	<div class="text-block1">
		<h1>REGISTRO DE EVENTO</h1>
	    	<p>EVENTOS REGISTRO </p>
	</div>
</div>
	
	<br><br><br><br><br><br><br>    
	<center>
		<form action="AddEvent.php" method="post" name="" id="ae1" enctype="multipart/form-data">
		<h4>Registro de Evento</h4>
		<div class="column" id="ae2">
			<p>Nombres</p>
			<input type="text" name="del" value="" placeholder="Nombres del Evento"><br><br>
			<p>Responsable</p>
			<input type="text" name="" value="" placeholder="Nombre del Responsable">
		</div>

		<div class="column" id="ae3">
			<img src="images1/imagensubir.png" id="addimage"><br>
			<input type="file" name="imageupload" value="Seleccionar Imagen" id="ae4" class="button">
		</div>

		<div style="clear:both;">&nbsp;</div>

		<div id="ae5">
			<p>Lugar</p>
			<input type="text" name="pl" value="" placeholder="Direccion del Lugar del Eventos"><br>
		</div>

		<div class="column" id="ae6">
			<p>Fetcha</p>
			<input type="date" name="da" value="" placeholder="00/00/0000">
		</div>

		<div class="column" id="ae7">
			<p>Hora</p>
			<input type="text" name="" value="" placeholder="00:00">
		</div>

		<div class="column" id="ae8">
			<p>Valor de Boleto</p>
			<input type="text" name="" value="" placeholder="$000.00">
		</div>

		<div style="clear:both;">&nbsp;</div>

		<div align="center"  id="ae9">
			
			<input type="submit" name="add" value="Guardar" id="ae10" class="button">
		</div>



		
	</form></center>
<br><br><br><br><br><br><br>

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

	$image=$_FILES['imageupload']['name'];
	$tempname=$_FILES['imageupload']['tmp_name'];
	$folder="images1/".$image;	
	$details=$_POST['det'];
	$place=$_POST['pl'];
	$date=$_POST['da'];

$sql="INSERT INTO `listofevents`( `image`, `details`, `place`, `dateof`) VALUES ('$folder','$details','$place','$date')";
var_dump($sql);
	$result=mysqli_query($conn,$sql);
	var_dump($result);
	if($result){
		echo $success="New Record inserted";
		echo "<img src='$folder' height='100' width='100'/>";
		
		?>
		<script>window.location.href = "List_of_Events_1.php";</script>
		
		<?php
		//header("refresh:5;url=List_of_Events_1.php");
	}
	else{
		echo $failure="Not inserted".mysqli_error($conn);	
	}

}





?>