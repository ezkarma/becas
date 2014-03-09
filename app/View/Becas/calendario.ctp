<div class="container" style="width:60%">
    <div class="row">
        <div class="span3 centred">
<h2>Listado de Becas Disponibles</h2>

<?php 
$con = true;
$mes = true;
$terminate = false;

$fecha_inicial = strtotime($becas[0]['Fecha']['fecha']);

foreach($becas as $beca){
	
	$fecha = strtotime($beca['Fecha']['fecha']);
	
	if(date('m', $fecha ) != date('m', $fecha_inicial )){
			$terminate = true;
			$mes = true;
			$con = true;
	}
	
	if($mes){
	switch (date('m', $fecha )) {
		case 1 : $mes_label = 'Enero';break;
		case 2 : $mes_label = 'Febrero';break;
		case 3 : $mes_label = 'Marzo';break;
		case 4 : $mes_label = 'Abril';break;
		case 5 : $mes_label = 'Mayo';break;
		case 6 : $mes_label = 'Junio';break;
		case 7 : $mes_label = 'Julio';break;
		case 8 : $mes_label = 'Agosto';break;
		case 9 : $mes_label = 'Septiembre';break;
		case 10 : $mes_label = 'Octubre';break;
		case 11 : $mes_label = 'Noviembre';break;
		case 12 : $mes_label = 'Diciembre';break;
		}
	?>
	
	<table class="table table-striped table-hover table-bordered">
		<h3><center><?php echo $mes_label.' '.date('Y', $fecha);?></center></h3>
		<th class="success">Lunes</th>
		<th class="success">Martes</th>
		<th class="success">Miercoles</th>
		<th class="success">Jueves</th>
		<th class="success">Viernes</th>
		<tr>
	<?php
	$mes = false;
	}
	
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
			if($beca['Fecha']['becas']>0 && $beca['Fecha']['habil']==1) echo '<td>'.$this->Html->link(date('d', $fecha ), array('controller' =>'becas','action'=> 'solicitar/'.$beca['Fecha']['fecha'])).'</td>';
			else echo '<td>'.date('d', $fecha ).'</td>';
			}
	
	else 	{
		if($beca['Fecha']['becas']>0 && $beca['Fecha']['habil']==1) echo '<td>'.$this->Html->link(date('d', $fecha ), array('controller' =>'becas','action'=> 'solicitar/'.$beca['Fecha']['fecha'])).'</td>';
		else echo '<td>'.date('d', $fecha ).'</td>';
		}
			
	$fecha_inicial = $fecha;	
		
	}
echo '</tr>';

?>
</table>

	 </div>
    </div>
</div>