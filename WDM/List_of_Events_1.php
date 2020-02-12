<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="CSS/leanevent.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/leanevent.css" media="screen and (max-width:480px) "/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
</head>
<body>
        <header>
        <div class="column"><img src="images1/logo-blanco.png" alt="pic" class="logo"></div>
        <div class="column" id="c2"><strong>LEANEVENTOS</strong></div>
        <pre><nav class="na">
        <a href="AgentLeanHome.php">Inicio</a>    <a href="List_of_Volunteers.php">Lista de Voluntarios</a>    <a href="List_of_Foundations.php">Liste de Fundaciones</a>    <a href="List_of_Events_1.php" class="active">Eventos</a>    <a href="AgentLeanProfile.php">Agente</a>    

    </nav></pre>
    </header>     
    
<br><br><br><br><br><br><br>
<center>
<caption><b><h1>Lista de Eventos</h1></b></caption></center>
<div id="le">
    

    
</div>
<br><br>
<br>
<center>


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
	//echo "Connected";
}



$result=mysqli_query($conn,"SELECT * FROM listofevents");
?>	

<table>

<thead>
        <tr>
            <th class="tc3">.</th>
            <th class="tc1">DETALLES DEL EVENTOS</th>
            <th class="tc2">LUGAR</th>
            <th class="tc3">FECHA</th>
            <th class="tc4">Modificar</th>
            <th class="tc5">eliminar</th>
        </tr>
</thead>
     	
<?php
 while($row = mysqli_fetch_array($result))

     {
?>
     	<tr>
           <!-- <td>
     	<?php 
        //echo  '<img src="data:image/jpg;base64,'.base64_encode($row['.']).'" height="100" width="100"/>';  
        ?>
            </td>-->

            <td>
                <img src="<?php echo $row['image']; ?>" height="100" width="100">
            </td>

            <td>
                <?php  echo $row['details']; ?>
            </td>
            <td>
                <?php echo $row['place'];  ?>
            </td>
            <td>
                <?php echo $row['dateof'];   ?>
            </td>
            <td class="tc4">
                <a href="modify.php?upd=<?php echo $row['ID']; ?>" style="color:blue;text-decoration: none"><i class="fa fa-edit" style="color:blue;"></i><br>Modify</a>
                
            </td>
            <td class="tc5">
                <a href="List_of_Events_1.php?del=<?php echo $row['ID']; ?>" style="color:red;text-decoration: none"><i class="fas fa-trash" style="color:red;"></i><br>Delete</a>
            </td>
        
        </tr>
        
        
  <?php       
}
?>


<tr>
<a href="AddEvent.php?add=<?php echo $row['ID']; ?>" style="color:black;text-decoration: none"><i class="fas fa-plus-circle" style="color: black"></i><br>ADD</a></tr>
<?php

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($conn, "DELETE FROM listofevents WHERE ID=$id");
   
    
}




mysqli_close($conn);

?>

</table>
</center>
<br><br><br><br><br><br><br><br>
<center id="hpf">
    Copyright &copy; 2019 All rights reserved! This web is made with <i class="far fa-heart"></i> by Diaz Apps
    </center>
</body>
</html>