<div class="col-lg-3">
</div>
<div class="col-lg-6">
<center><h2>Asignacion de Becas</h2>
<br>
<legend>
Es necesario asignar el numero de becas con las que contará cada alumno 
beneficiario del programa de becas alimenticias.
</legend>
<legend>
<?php

	$con = 0;
	foreach($becas as $beca){
		$con = $con + $beca['Fecha']['becas'];
	}
	
	echo '<br> El total de becas disponibles es: '.$con;
	
	echo '<br> El total de alumnos aceptados es: '.$total_alumnos;
	
	$asignacion = intval($con/$total_alumnos);
	
	//echo '<br><br> El numero de becas por alumno es de: '.$asignacion;
	
	echo '</legend>';
	
	echo $this->Form->create('Alumno', array(
    'inputDefaults' => array(
        'label' => false
    )
	));

echo $this->Form->input('dias_disp', array('value'=>$asignacion,'label'=>'Numero de Becas por Alumno','class'=>'form-control','style'=>'width:80px'));

echo $this->Form->end(__('Asignar')); 

?>

</div>
</center>

 