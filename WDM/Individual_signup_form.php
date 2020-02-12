<!Doctype html>
<html>
<head>
	<title>Individual Sign_Up</title>
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css">
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css" media="screen and (max-width:480px) "/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!--<script type="text/javascript">
function validate()
{
  var a= document.forms["isform"]["mail"].value;
  var b= document.forms["isform"]["pass"].value;
  var c= document.forms["isform"]["fname"].value;
  var d= document.forms["isform"]["lname"].value;
  var e= document.forms["isform"]["address"].value;
  var f= document.forms["isform"]["city"].value;
  var g= document.forms["isform"]["postal"].value;
 
    
  if(a == ""||a==null)
  {
    alert("EMail must not be empty");
    return false;
  }
  if(b == ""||b==null)
  {
    alert("Password must not be empty");
    return false;
  }
  if(c == ""||c==null)
  {
    alert("First Name must not be empty");
    return false;
  }
  if(d == ""||d==null)
  {
    alert("Last Name must not be empty");
    return false;
  }
  if(e == ""||e==null)
  {
    alert("Address must not be empty");
    return false;
  }
  if(f == ""||f==null)
  {
    alert("City must not be empty");
    return false;
  }
   if(g == ""||g==null)
  {
    alert("Postal must not be empty");
    return false;
  }
  
  
  
}

</script>-->


</head>
<body>
	<center>
		<form method="post" name="isform" id="f_isf" onsubmit="return validateForm()" >
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
				<select id="states" >
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

	  		<div id="isf9"><input type="button" value="Registrarse" class="button" onclick="return validateForm()"/>
	  		</div><hr>
	  		<div class="clear">&nbsp;</div>
	  		<div id="isf10" align="right"><button type="submit"  class="button">Cerrar</button>
	  		</div>
  		
        </form>
    </center>
  
  <script src="SCRIPT/script1.js">
</script>

</body>
</html>
