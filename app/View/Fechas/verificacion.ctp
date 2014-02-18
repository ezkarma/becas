<div class="users form" style="width:30%;margin-right:30%;" >
<h2>Verificacion</h2>

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
	//echo date('Y-m-d', strtotime($Date. ' + '.$i .' days'));
	$con_dias=$con_dias+1;
	}
	
}

echo '<br><br>El total de Dias disponibles es: '.$con_dias;

echo '<br><br>';

echo $this->Form->create('Fecha', array(
    'inputDefaults' => array(
        'label' => false
    )
));

$con_form = 0;

for($i=0;$i<$datediff+1;$i++){
	
	if(date('N', strtotime($Date. ' + '.$i .' days')) < 6) {
		$fecha_beca = date('Y-m-d', strtotime($Date. ' + '.$i .' days'));
		$fecha_label = date('d-m-Y', strtotime($Date. ' + '.$i .' days'));
		echo $this->Form->input('Fecha.'.$con_form.'.fecha', array('type'=>'checkbox','value'=>$fecha_beca,'label'=>$fecha_label, 'checked'=>'true')); 
		echo $this->Form->input('Fecha.'.$con_form.'.becas', array('type'=>'hidden','value'=>$periodos['Periodo']['becas_dia']));
		
		$con_dias=$con_dias+1;
		$con_form++;
	}
	 echo '<hr></hr>';
}

echo $this->Form->end(__('Guardar')); 

?>

</div>
</center>
