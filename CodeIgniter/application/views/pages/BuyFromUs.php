<pre><nav class="na">


		<a href="<?php echo base_url() ?>leancont/Homepage1" >Inicio</a>    <a href="<?php echo base_url() ?>leancont/AboutUs" >Quienes Somos</a>    <a href="http://rachananpatil.uta.cloud/lean-event/">Blog</a>    <a href="<?php echo base_url() ?>leancont/SignUp">Registrate</a>    <a href="<?php echo base_url() ?>leancont/ContactUs">Contacto</a>    <a href="<?php echo base_url() ?>Login/login">Iniciar Sesion</a>    <a href="<?php echo base_url() ?>leancont/BuyFromUs" class="active">Comprar Boletos</a> 


	</nav></pre>

	<div class="container">
	<img src="<?php echo base_url(); ?>images1/bannercboleto.jpg" alt="pic" class="imall">
	<div class="text-block1"> 
	    	<h1>COMPRAR BOLETOS</h1>
	    	<p>HOME COMPRAR BOLETOS </p>
  		</div>
	</div>
	<br><br>

	<table>
		<thead><tr><th></th>
     			   <th>Rate</th>
     			    <th>Description</th>
     		   </tr>
     	</thead>
     	<tbody>
<?php
if($fetch->num_rows()>0)
{
	foreach ($fetch->result() as $row)
	 {
	 	?>
	 	<tr>
	<td><a href="buy"><img src="<?php echo base_url();?>images1/minibaner4.jpg" alt="pic"  height="50" width="50"></a></td>
	<td><?php echo $row->P_price; ?></td>
	<td><?php echo $row->P_description; ?></td>
	
</tr>

<?php
}
}

else{
?>

<tr><td colspan="11">No data founf</td></tr>
<?php
}
?>






</tbody>
</table>
