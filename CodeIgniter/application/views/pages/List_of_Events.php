<pre><nav class="na">
		<a href="<?php echo base_url() ?>leancont/AgentLeanHome" class="active">Inicio</a>    <a href="<?php echo base_url() ?>leancont/List_of_Volunteers">Lista de Voluntarios</a>    <a href="<?php echo base_url() ?>leancont/List_of_Foundations">Liste de Fundaciones</a>    <a href="<?php echo base_url() ?>Eventos/events" >Eventos</a>    <a href="<?php echo base_url() ?>leancont/AgentLeanProfile">Agente</a>    

	</nav></pre>

	    
<br><br><br><br><br><br><br>
<center>
<caption><b><h1>Lista de Eventos</h1></b></caption></center>
<div id="le">
    

    
</div>
<br><br>
<br>
<center>
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
  <tbody>
    <tr>
                <a href="<?php echo base_url() ?>Eventos/add" style="color:black;text-decoration: none"><i class="fas fa-plus-circle" style="color: black"></i><br>ADD</a>
</tr>
<?php
    if($fetch->num_rows()>0)
    {
        foreach ($fetch->result() as $row)
        {
?>
            <tr>
                <td><?php echo $row->image; ?></td>
                <td><?php echo $row->details; ?></td>
                <td><?php echo $row->place; ?></td>
                <td><?php echo $row->dateof; ?></td>
                <td class="tc4">
                    <?php echo anchor("Eventos/modify/{$row->ID}",'Modify',['class'=>'']);  ?>
                    <i class="fa fa-edit" style="color:blue;"></i>
                <!--<a href="" style="color:blue;text-decoration: none"><i class="fa fa-edit" style="color:blue;"></i><br>Modify</a>-->
                
                </td>
                <td class="tc5">

                    <?php echo anchor("Eventos/delete/{$row->ID}",'Delete',['class'=>'']);  ?>
                <!--<a href="<?php //echo base_url() . "Eventos/delete/" . $row->ID; ?>" -->
                 <i class="fas fa-trash" style="color:red;"></i>
                </td>
                
            </tr>
           
<?php
        }
    }

    else{
?>

            <tr><td colspan="11">No data found</td></tr>
<?php
        }
?>
 









</tbody>
</table>
</center>
<br><br><br><br><br><br><br><br>