<pre><nav class="na"><strong>
		<a href="<?php echo base_url() ?>leancont/IndiviHome" class="active">Inicio</a>    <a href="<?php echo base_url() ?>leancont/IndiviProfile">Individual</a>    </strong> 

	</nav></pre>

<div class="container">
	<img src="<?php echo base_url() ?>images1/bannercontacto.jpg" alt="pic" class="imall">
	<div class="text-block1"> 
	    	<h1>PERIL </h1>
	    	<p>INICIO PERIL</p>
  	</div>
</div>
	

	
	<br><br><br><br><br><br><br>

	<div id="pro"><h3>Tu Informacion del Peril</h3></div>

	<div class="column" id="pro1">
		<span  class="fontawe">
  			<i class="fas fa-book"></i>
		</span>
		Nombres del Inscrito<br><br>
		<span  class="fontawe">
  			<i class="fas fa-book"></i>
		</span>
		Apellidos del Inscrito<br><br>
		<span  class="fontawe">
  			<i class="fas fa-user"></i>
		</span>
		Nombre del Usuario<br><br>
	</div> 

	<div class="column" id="pro2">
		<span  class="fontawe">
  			<i class="fas fa-map-marker-alt"></i>
		</span>
		198 West 21th Street,<br>
		 Suite 721 New York NY 10016<br><br>
		<span  class="fontawe">
  			<i class="fas fa-phone"></i>
		</span>
		+1235 2355 98<br><br>
		<span  class="fontawe">
  			<i class="far fa-paper-plane"></i>
		</span>
		nombredecorreo@gmail.com
	</div> 

	<div class="column" id="pro3">
		<img src="<?php echo base_url() ?>images1/user.png" width="150" height="170">
		
	</div>

	<br><br><br><br><br><br><br> <br><br><br><br><br><br><br> 

	<center>

 <?php 

 		$this->load->library('form_validation'); 
        echo validation_errors();  
        $attributes = array('class'=>'ae1');
        echo form_open_multipart('Profile/update_profile',$attributes); 

        if($fetch->num_rows() > 0)
        //if(count($result)>0)
		{
			foreach ($fetch->result() as $row)
	 		{
	 	?>

       	
        
			
		<h3>Estar en contacto</h3><hr>

		<div class="column" id="ae2">
			<?php echo form_label('Nombres '); ?>
			<?php echo form_input(array('name' => 'fname', 'placeholder' => 'Tu Nombre ','value'=>set_value('fname',$row->fname))); ?>
			<?php echo form_label('Apellido'); ?>
			<?php echo form_input(array('name' => 'lname', 'placeholder' => 'Tu Appellido','value'=>set_value('lname',$row->lname))); ?>
		</div>


		  	
		  <div class="column" id="ae3">
			<img src="<?php echo base_url() ?>images1/user.png" width="150" height="170"><br>
			<?php echo form_input(array('type' => 'file','name' => 'userfile', 
				'value' => 'Seleccionar logo','id'=>"ae4",'class'=>'button')); ?> 
					
		  </div>
		  		<!--<div style="clear:both;">&nbsp;</div>-->
		  
					<div id="ae5">
			
					<?php echo form_label('Correo :'); ?>
					<?php echo form_input(array('name' => 'mail', 'placeholder' => 'Tu correo electronico','value'=>set_value('mail',$row->mail))); ?> 
				</div>
				
		  	
		  		<div class="column" id="ae6">
					<?php echo form_label('Telefono'); ?>
					<?php echo form_input(array('name' => 'phone', 'placeholder' => 'Telefono','value'=>set_value('phone',$row->phone))); ?> 
		  		</div>

		  		<div style="clear:both;">&nbsp;</div>
		  		
				<div class="column" id="ae7">
					<?php echo form_label('Usuario'); ?>
					<?php echo form_input(array('name' => 'username', 'placeholder' => 'Nombre de Usuario','value'=>set_value('username',$row->username))); ?> 
		        </div>

		       
		  			
				<div class="column" id="ae8">
			
					<?php echo form_label('Contrasena'); ?>
					<?php echo form_input(array('name' => 'password', 'placeholder' => 'Contrasena','value'=>set_value('password',$row->passsword))); ?> 
		 		</div>
		  		<div style="clear:both;">&nbsp;</div>
		<p>Note:</p>
		<p>Solo puede cambiar los datos(Telefono, Contrasena y Foto)</p>

		  		
		  		<div align="center"  id="ae9">
					<?php echo form_input(array('type' => 'submit','name' => 'postal', 'value' => 'Guardar Cambios','id'=>'ae10','class'=>'button')); ?> 
		  		</div>

		  		<div class="clear">&nbsp;</div>
		  		
		  		
	  	
	  	<?php
	  			}}
	  	 echo form_close(); ?>




	</center>
	