<div class="container" style="width:60%">
    <div class="row">
        <div class="span3 centred">
<center><h2>Verificación de Fechas</h2></center>

<?php
	

	$Date = $periodos['Periodo']['inicio'];
	$Date2 = $periodos['Periodo']['final'];
	
	$now = strtotime($Date);
    $your_date = strtotime($Date2);
    $datediff = ($your_date-$now)/(60*60*24);
  
	
	$fecha = $now/(60*60*24);
	$fecha2 = $your_date/(60*60*24);
	echo 'Fecha de Inicio: '.$Date;
	echo '<br>';
	echo  'Fecha de Fin: '.$Date2;
	echo '<br><br>';


 $con_dias=0;

for($i=0;$i<$datediff+1;$i++){
	
	if(date('N', strtotime($Date. ' + '.$i .' days')) < 6) {
	$con_dias=$con_dias+1;
	}
	
}

echo '<br><br>El total de Dias disponibles es: '.$con_dias;

echo '<br><br>';

/*
*Calendario Starts here
*
*/

$con = true;
$mes = true;
$terminate = false;

$fecha_inicial = strtotime($periodos['Periodo']['inicio']);

////////////////////////////

echo $this->Form->create('Fecha', array(
    'inputDefaults' => array(
        'label' => false
    )
));

$con_form = 0;

for($i=0;$i<$datediff+1;$i++){
	
	if(date('N', strtotime($Date. ' + '.$i .' days')) < 6) {
	
	$fecha = strtotime($Date. ' + '.$i .' days');
	
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
			echo '<td>';
			$fecha_beca = date('Y-m-d', strtotime($Date. ' + '.$i .' days'));
			$fecha_label = date('d', strtotime($Date. ' + '.$i .' days'));
			echo $this->Form->input('Fecha.'.$con_form.'.habil', array('type'=>'checkbox','label'=>$fecha_label, 'checked'=>'true')); 
			echo $this->Form->input('Fecha.'.$con_form.'.fecha', array('type'=>'hidden','value'=>$fecha_beca,'label'=>$fecha_label)); 
			echo $this->Form->input('Fecha.'.$con_form.'.becas', array('type'=>'hidden','value'=>$periodos['Periodo']['becas_dia']));
			echo '</td>';		
			}
		
		else 	{
			echo '<td>';
			$fecha_beca = date('Y-m-d', strtotime($Date. ' + '.$i .' days'));
			$fecha_label = date('d', strtotime($Date. ' + '.$i .' days'));
			echo $this->Form->input('Fecha.'.$con_form.'.habil', array('type'=>'checkbox','label'=>$fecha_label, 'checked'=>'true')); 
			echo $this->Form->input('Fecha.'.$con_form.'.fecha', array('type'=>'hidden','value'=>$fecha_beca,'label'=>$fecha_label)); 
			echo $this->Form->input('Fecha.'.$con_form.'.becas', array('type'=>'hidden','value'=>$periodos['Periodo']['becas_dia']));
			echo '</td>';	
		}
		
		$fecha_inicial = $fecha;	
			
		$con_dias=$con_dias+1;
		$con_form++;
	}
	
}
echo '</tr>';
?>
</table>

<center>
<?php
///////////Finaliza Form
echo $this->Form->end(__('Siguiente')); 

?>
<center>

</div>
</div>
</div>

