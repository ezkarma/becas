<!-- app/View/Users/add.ctp -->

<h2>Listado de Becas Disponibles</h2>

<h3>Bienvenido
<?php
echo $usuario_registrado['nombre'];
?>
</h3>

<table class="table table-striped table-hover table-bordered">
<th class="success">Lunes</th>
<th class="success">Martes</th>
<th class="success">Miercoles</th>
<th class="success">Jueves</th>
<th class="success">Viernes</th>


<?php 
$con = true;
echo '<tr>';
foreach($becas as $beca){
	$fecha = strtotime($beca['Fecha']['fecha']);
	
	if($con){
			switch (date('D', $fecha )) {
			case 'Tue':
					echo '<td></td>';
					break;
			case 'Wed':
					echo '<td></td>';
					echo '<td></td>';
					break;
				case 'Thu':
					echo '<td></td>';
					echo '<td></td>';
					echo '<td></td>';
					break;
				case 'Fri':
					echo '<td></td>';
					echo '<td></td>';
					echo '<td></td>';
					echo '<td></td>';
					break;
		}
		$con = false;
	}

		if (date('D', $fecha )==='Mon'){
			echo '</tr>';
			echo '<tr>';
			if($beca['Fecha']['becas']>0) echo '<td>'.$this->Html->link(date('d', $fecha ), array('controller' =>'becas','action'=> 'solicitar/'.$beca['Fecha']['fecha'])).'</td>';
			else echo '<td>'.date('d', $fecha ).'</td>';
			}
	
	else 	{
		if($beca['Fecha']['becas']>0) echo '<td>'.$this->Html->link(date('d', $fecha ), array('controller' =>'becas','action'=> 'solicitar/'.$beca['Fecha']['fecha'])).'</td>';
		else echo '<td>'.date('d', $fecha ).'</td>';
		}
	}
echo '</tr>';
?>
</table>