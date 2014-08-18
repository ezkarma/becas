<div class="row">
	<div class="col-lg-4">	
     </div>
	 
	 <div class="col-lg-4">
<center><h2>Cafeteria <?php echo $cafeteria['Cafeteria']['nombre']?> </h2></center>

<br>
		<table class='table'>
		<th>Nombre</th>
		<th>Telefono</th>
		<th>Correo Electronico</th>
		
		
		
	<?php
	foreach ($encargados as $encargado){
		echo '<tr>';
		echo '<td>'.$encargado['CafeteriaEncargado']['nombre'].'</td>';
		echo '<td>'.$encargado['CafeteriaEncargado']['telefono'].'</td>';
		echo '<td>'.$encargado['CafeteriaEncargado']['correo'].'</td>';
		echo '</tr>';
	}
	?>
	</table>
	<?php $icono = $this->Html->tag('span', ' ', array('class'=>'glyphicon glyphicon-user'));
				echo '<br><center>'.$this->Html->link($icono."  Agregar Encargado de Cafeteria", array('controller' =>'cafeterias','action'=> 'agregar_encargado/'.$cafeteria['Cafeteria']['id']),array('class'=>'btn btn-success','escape'=>false)).'<center>';
	?>
	</div>
</div>
</div>
	
	