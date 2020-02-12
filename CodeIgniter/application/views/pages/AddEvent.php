<pre><nav class="na">
		<a href="<?php echo base_url() ?>leancont/AgentLeanHome">Inicio</a>    <a href="<?php echo base_url() ?>leancont/List_of_Volunteers">Lista de Voluntarios</a>    <a href="<?php echo base_url() ?>leancont/List_of_Foundations">Liste de Fundaciones</a>    <a href="<?php echo base_url() ?>leancont/AddEvent" class="active">Eventos</a>    <a href="<?php echo base_url() ?>leancont/AgentLeanProfile">Agente</a>    

	</nav></pre>




<div class="container">
	<img src="<?php echo base_url(); ?>images1/bannerregistro.jpg" alt="pic" class="imall"> 
	<div class="text-block1">
		<h1>REGISTRO DE EVENTO</h1>
	    	<p>EVENTOS REGISTRO </p>
	</div>
</div>
	
	<br><br><br><br><br><br><br>    
	<center>

<?php $this->load->library('form_validation'); 
         					   echo validation_errors(); ?>  
         <?php $attributes = array('class'=>'ae1');
               echo form_open_multipart('Eventos/add',$attributes); ?>	

               	<h4>Registro de Evento</h4>

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





                 <?php echo form_close(); ?>





<!--	<form action="AddEvent.php" method="post" name="" id="ae1" enctype="multipart/form-data">
		<h4>Registro de Evento</h4>
		<div class="column" id="ae2">
			<p>Nombres</p>
			<input type="text" name="del" value="" placeholder="Nombres del Evento"><br><br>
			<p>Responsable</p>
			<input type="text" name="" value="" placeholder="Nombre del Responsable">
		</div>

		<div class="column" id="ae3">
			<img src="<?php// echo base_url(); ?>images1/imagensubir.png" id="addimage"><br>
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



		
	</form>
-->

	</center>
<br><br><br><br><br><br><br>
