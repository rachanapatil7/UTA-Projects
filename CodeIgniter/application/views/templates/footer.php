<script type="text/javascript" src="<?php echo base_url(); ?>SCRIPT/script.js"></script>


<footer>
		<div>
			<i class="far fa-paper-plane"></i>
  			Registrese para recibir un
  			<div class="foo">
  			boletin
  		</div>
  		

		 <?php $this->load->library('form_validation'); 
         		//echo validation_errors(); ?>  
         <?php echo form_open('subscribe'); ?>		
        <?php echo form_input(array('type'=>'email','name' => 'email', 'class' => 'f1')); ?> 
        <?php echo form_input(array('type'=>'submit','name' => 'subs', 'class' => 'f2','value'=>'Subscribr')); ?>

				
		</div>
  		
	</footer><br><br>
	<center>LEAN EN LAS REDES SOCIALES</center><br>
	<center>
		<span  class="fontawesome">
  			<i class="fab fa-twitter"></i>
		</span>
		<span class="fontawesome">
  			<i class="fab fa-facebook-f"></i>
		</span>
		<span class="fontawesome">
  			<i class="fab fa-instagram"></i>
		</span>
	</center><br><br><br><br>
	<center id="hpf">
	Copyright &copy; 2019 All rights reserved! This web is made with <i class="far fa-heart"></i> by Diaz Apps
	</center>


</body>
</html>