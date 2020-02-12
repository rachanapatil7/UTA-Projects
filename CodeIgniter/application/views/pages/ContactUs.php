<pre><nav class="na">


		<a href="<?php echo base_url() ?>leancont/Homepage1" >Inicio</a>    <a href="<?php echo base_url() ?>leancont/AboutUs" >Quienes Somos</a>    <a href="http://rachananpatil.uta.cloud/lean-event/">Blog</a>    <a href="<?php echo base_url() ?>leancont/SignUp">Registrate</a>    <a href="<?php echo base_url() ?>leancont/ContactUs" class="active">Contacto</a>    <a href="<?php echo base_url() ?>Login/login">Iniciar Sesion</a>    <a href="<?php echo base_url() ?>leancont/BuyFromUs">Comprar Boletos</a> 


	</nav></pre>

	<br><br>
	
<div class="container">
	<img src="<?php echo base_url(); ?>images1/bannercontacto.jpg" alt="pic" class="imall">
	<div class="text-block1"> 
	    	<h1>CONTACTO</h1>
	    	<p>INICIO CONTACTO</p>
  		</div>
</div>
<center><div id="cu">
<p><b>Informacion del contacto</b></p>
	<div class="column">
		<span  class="fontawe">
  			<i class="fas fa-map-marker-alt"></i>
		</span>
		198 West 21th Street,<br>
		 Suite 721 New York NY 10016
	</div>
	<div class="column">
		<span  class="fontawe">
  			<i class="fas fa-phone"></i>
		</span>
		+1235 2355 98
	</div>
	<div class="column">
		<span  class="fontawe">
  			<i class="far fa-paper-plane"></i>
		</span>
		info@diazapps.com
	</div>
	<div class="column">
		<span  class="fontawe">
  			<i class="fas fa-globe"></i>
		</span>
		diazapps.com
	</div>
	<br>
	<br><br><br>
	<p>LEAN en las redes sociales</p>
	<br>
	<div class="column1">
		<img src="<?php echo base_url(); ?>images1/facebook.png" alt="pic" id="culogo">
		<p id="fon">LEAN Ayuda Humanitaria</p>
	</div>
	<div class="column1">
		<img src="<?php echo base_url(); ?>images1/twitter.png" alt="pic" id="culogo">
		<p id="fon">@LeanEmergente</p>
	</div>
	<div class="column1">
		<img src="<?php echo base_url(); ?>images1/instagram.png" alt="pic" id="culogo">
		<p id="fon">@LeanAyudaHumanitaria</p>
	</div>
	<div class="column1">
		<img src="<?php echo base_url(); ?>images1/correo.png" alt="pic" id="culogo">
		<p id="fon">lean.emergente@gmail.com</p>
	</div>
</div>
	<br>
	<br><br><br><br><br>

	<?php $this->load->library('form_validation'); 
         					   echo validation_errors(); ?>  
         <?php $attributes = array('class'=>'f_cu');
               echo form_open('ContactUs',$attributes); ?>	
	
		
			<h3 align="left">Estar en contacto</h3>
			<div class="column" id="cu1">
				<?php echo form_label('Nombre'); ?>
				<?php echo form_input(array('name' =>'fname','placeholder'=>'Tu Nombre')); ?> 
				
			</div>

	  		<div class="column" id="cu2">
	  			<?php echo form_label('Appellido'); ?>
				<?php echo form_input(array('name'=>'lname','placeholder'=>'Tu Appellido')); ?> 
	  		</div>

	  		<div style="clear:both;">&nbsp;</div>

	  		<div id="cu3">
	  			<?php echo form_label('Correo'); ?>
			<?php echo form_input(array('name'=>'mail','placeholder'=>'Tu correo electronico')); ?>
				
			</div>

			<div  id="cu4">
				<?php echo form_label('Tema'); ?>
			<?php echo form_input(array('name'=>'topic','placeholder'=>'Su asunto de este mensaje')); ?>
				
			</div>
			<div  id="cu5">
				<?php echo form_label('Mensaje'); ?>
			<?php echo form_input(array('name'=>'message','placeholder'=>'Di algo sobre nosotros')); ?>
				
			</div>
			<div id="cu6" align="center">
				<?php echo form_input(array('type'=>'submit','name'=>'insert','class' => 'button', 'value' => 'Enviar mensaje')); ?>
				
	  		</div>
		
	   <?php echo form_close(); ?>
    </center>
	
<br><br><br><br><br><br><br><br><br><br><br>