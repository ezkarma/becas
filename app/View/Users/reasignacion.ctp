<div class="container" style="width:60%">
    <div class="row">
        <div class="span3 centred">
<h2>Reasignacion de Becas Vencidas</h2>
<br>
		<table class='table'>
		<th>Matricula</th>
		<th>Alumno</th>
		<th>Fecha Otorgada</th>
		<th>Reasignar</th>
		<th>Eliminar</th>
		
	<?php
	foreach ($usuarios as $usuario){
		echo '<tr>';
		echo '<td>'.$usuario['Beca']['username'].'</td>';
		echo '<td>Nombre del Alumno</td>';
		echo '<td>'.$usuario['Beca']['fecha'].'</td>';
		echo '<td>'.$this->Html->link("Reasignar", array('controller' =>'becas','action'=> 'reasignar_beca/'.$usuario['Beca']['username'].'/'.$usuario['Beca']['id'])).'</td>';
		echo '<td>'.$this->Html->link("Eliminar", array('controller' =>'becas','action'=> 'eliminar_beca/'.$usuario['Beca']['id']),array(),'¿Esta seguro que desea eliminar esta beca?').'</td>';
		echo '</tr>';
	}
	?>
	</table>
	</div>
</div>
</div>
	
	