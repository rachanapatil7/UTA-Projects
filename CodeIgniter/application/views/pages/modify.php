<html>
<head>
<title>Register Individual</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>CSS/leanevent.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>


<div id="f_isf">

	<center>
		
<?php 

//foreach($data->row() as $row){
$this->load->library('form_validation'); 
         		echo validation_errors(); ?>  
 <?php $attributes = array('class'=>'ae1');
               echo form_open_multipart('Eventos/update_record',$attributes); ?>	

               	<h4>Registro de Evento</h4>
<?php echo form_input(array('type' => 'hidden','name' => 'eid')); ?> 
               	<div class="column" id="ae2">
               		<?php echo form_label('Nombres'); ?>
				<?php echo form_input(array('name' =>'fname','placeholder'=>'Nombre del evento')); ?> 
				<?php echo form_label('Responsable'); ?>
				<?php echo form_input(array('name' =>'response','placeholder'=>'Nombre del Responsable')); ?>
			
			
				</div>

		<div class="column" id="ae3">
			<img src="<?php echo base_url(); ?>images1/imagensubir.png" id="addimage"><br>
			
			<?php echo form_input(array('type' => 'file','name' => 'userfile', 
				'value' => 'Seleccionar Imagen','id'=>"ae4",'class'=>'button')); ?> 
		</div>

		<div style="clear:both;">&nbsp;</div>

		<div id="ae5">
			<?php echo form_label('Lugar'); ?>
				<?php echo form_input(array('name' =>'place','placeholder'=>'Direccion del Lugar del Eventos')); ?>
			
		</div>

		<div class="column" id="ae6">
			<?php echo form_label('Fetcha'); ?>
				<?php echo form_input(array('type'=>'date','name' =>'dat','placeholder'=>'00/00/0000')); ?>
			
		</div>

		<div class="column" id="ae7">
			<?php echo form_label('Hora'); ?>
				<?php echo form_input(array('name' =>'time','placeholder'=>'00:00')); ?>
			
		</div>

		<div class="column" id="ae8">
			<?php echo form_label('Valor de Boleto'); ?>
				<?php echo form_input(array('name' =>'amt','placeholder'=>'$000.00')); ?>
			
			
		</div>

		<div style="clear:both;">&nbsp;</div>

		<div align="center"  id="ae9">
			<?php echo form_input(array('type'=>'submit','name'=>'add','class' => 'button', 'value' => 'Guardar','id'=>'ae10')); ?>
			
		</div>





                 <?php 
                 echo form_close(); ?>

</center>
	       
	    </div>
</body></html>