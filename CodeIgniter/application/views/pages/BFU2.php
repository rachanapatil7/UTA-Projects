<pre><nav class="na">


		<a href="<?php echo base_url() ?>leancont/Homepage1" >Inicio</a>    <a href="<?php echo base_url() ?>leancont/AboutUs" >Quienes Somos</a>    <a href="http://rachananpatil.uta.cloud/lean-event/">Blog</a>    <a href="<?php echo base_url() ?>leancont/SignUp">Registrate</a>    <a href="<?php echo base_url() ?>leancont/ContactUs">Contacto</a>    <a href="<?php echo base_url() ?>Login/login">Iniciar Sesion</a>    <a href="<?php echo base_url() ?>leancont/BuyFromUs" class="active">Comprar Boletos</a> 


	</nav></pre>

	<img src="<?php echo base_url() ?>images1/bannercboleto.jpg" alt="pic" class="imall">

	<div class="bfu_container">
		<div class="column" id="bfu1">
			<img src="<?php echo base_url() ?>images1/minibaner4.jpg" align="pic" class="bu" >
		</div>
		<div class="column">
			<h4>NO PERDAMOS LA FE</h4>
			<strong>$300</strong>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			<i class="fas fa-star" id="star"></i><i class="fas fa-star" id="star" ></i><i class="fas fa-star" id="star" ></i><i class="fas fa-star" id="star"></i><i class="fas fa-star" id="star" ></i>(74 Rating)
			<br>
			<div>
				<p>ila fe no se puede perder JAMAS! Es imprescrindible para todo en nuestras vidas,poco a poco las cosa iran</p>
				<p>Numero de Entradas</p>


			
			<?php $this->load->library('form_validation'); 
         		 $attributes = array('class'=>'');
               	 echo form_open('buy',$attributes); ?>

               	<?php echo form_label('Quantity'); ?>
				<?php echo form_input(array('type'=>'number','name' => 'bfu')); ?> 

               <?php echo form_input(array('type'=>'submit','class' => 'btn', 'value' => 'Comprar','name'=>'add')); ?>

               	<?php echo form_close(); ?>

			</div>
		</div>
	</div>

	<div class="bfu1_container">
		<div class="column">
			<input type="button" name="" value="DESCRIPCION" class="btn1">
		</div>
		<div class="column">
			<input type="button" name="" value="ENCARGADOS" class="btn1">
		</div>
		<div class="column">
			<input type="button" name="" value="PATROCINANTES" class="btn1">
		</div>
		<div style="clear:both;">&nbsp;</div>
		<div id="buy">
				Recin he comenzado a leer un libro cuyo mensaje principle es aprender a buscar ese also mejortodos los dias. El libro esta escrito por una persona que vive con diabetes tipo 1 y nos presentt como los adelantos eb tratamientos y tecnologia. aunque no han curado su condicion, dia tras dia mejoran su calidad de vida.

				Busquemos siempre algo en nuestors vidas, mantengamos el desco de progressar, de educmaos mas acerca de la condicion de nuestros hijos y veras como poco a poco comenzaremos a entenderia mejor.
		</div>

			
	</div>