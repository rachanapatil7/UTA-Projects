<html>
<head>
<title>Register Lean Staff</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>CSS/leanevent.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>


<div id="f_isf">

	<center>


						 <?php
         $this->load->library('form_validation'); 
         echo validation_errors(); ?>  
         <?php
         	$attributes = array(
     'class'=>'f_isf'
);
          echo form_open('lean',$attributes); ?>		
        
			
				<h5 align="left">Registro de Agente LEAN</h5><hr>

				<div class="column" id="isf1">
					<?php echo form_label('Correo :'); ?>
					<?php echo form_input(array('name' => 'mail', 'placeholder' => 'Correo',)); ?> 

				</div>
		  		<div class="column" id="isf2">
		  			
					<?php echo form_label('Contrasena :'); ?><br>
					<?php echo form_input(array('type' => 'password','name' => 'pass', 'placeholder' => 'Contrasena')); ?> 
					
		  		</div>
		  		<!--<div style="clear:both;">&nbsp;</div>-->
		  		<div class="column" id="isf3">
					
					<?php echo form_label('Nombre :'); ?>
					<?php echo form_input(array('name' => 'fname', 'placeholder' => 'Nombre')); ?> 
				</div>
				
		  		<div class="column" id="isf4">
		  			
					<?php echo form_label('Apellido :'); ?>
				<?php echo form_input(array('name' => 'lname', 'placeholder' => 'Appellido')); ?> 
		  		</div>
		  		<div style="clear:both;">&nbsp;</div>
		  		<div id="isf5">
		  			
		        	<?php echo form_label('Direccion'); ?>
					<?php echo form_input(array('name' => 'address', 'placeholder' => 'Direccion')); ?> 
		        </div>
		        <div id="isf6">
		  			
					<?php echo form_label('Ciudad :'); ?>
					<?php echo form_input(array('name' => 'city', 'placeholder' => 'Ciudad')); ?> 
		  		</div>
		  		
		  		<div class="column" id="isf7">
		  			<?php echo form_label('Estado :');
		  			$data_state= array(
		  			'state' => 'state',
		  			'state1' => 'state1',
		  			'state2' => 'state2',
		  			'state3' => 'state3',
		  			); ?><br>
		  			<?php echo form_dropdown('sts',$data_state,'state'); ?>
					

				</div>
		  		<div class="column" id="isf8">
		  			
		  			<?php echo form_label('Codigo:'); ?>
					<?php echo form_input(array('type' => 'text','name' => 'postal', 'placeholder' => 'post')); ?> 
		  		</div>
		  		<div class="clear">&nbsp;</div>
		  		<div id="isf9">
		  		
					<?php echo form_input(array('type'=>'submit','class' => 'sub', 'value' => 'Registrar')); ?>
		  		</div><hr>
		  		
	  	
	  	<?php echo form_close(); ?>


</center>
	       
	    </div>
</body></html>