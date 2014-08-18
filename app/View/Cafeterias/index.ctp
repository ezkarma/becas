<div class="row">
	<div class="col-lg-2">	
     </div>
	 
	 <div class="col-lg-8">
<center><h2>Cafeterias</h2></center>

<br>
		<table class='table'>
		<th>Nombre</th>
		<th>Hora de Apertura</th>
		<th>Hora de Cierre</th>
		<th><center>Becas que Otorga</center></th>
		<th><center>Encargados</center></th>
		
		
	<?php
	foreach ($cafeterias as $cafeteria){
		echo '<tr>';
		echo '<td>'.$cafeteria['Cafeteria']['nombre'].'</td>';
		echo '<td>'.$cafeteria['Cafeteria']['hora_apertura'].'</td>';
		echo '<td>'.$cafeteria['Cafeteria']['hora_cierre'].'</td>';
		echo '<td><center>'.$cafeteria['Cafeteria']['becas_otorgar'].'</center></td>';
		echo '<td><center>'.$this->Html->link("Ver", array('controller' =>'cafeterias','action'=> 'encargados/'.$cafeteria['Cafeteria']['id']),array('class'=>'btn btn-warning btn-sm','escape'=>false)).'<center></td>';
		echo '</tr>';
	}
	?>
	</table>
	<?php $icono = $this->Html->tag('span', ' ', array('class'=>'glyphicon glyphicon-home'));
				echo '<br><center>'.$this->Html->link($icono."  Agregar Cafeteria", array('controller' =>'cafeterias','action'=> 'agregar'),array('class'=>'btn btn-success','escape'=>false)).'<center>';
	?>
	</div>
</div>
</div>
	
	