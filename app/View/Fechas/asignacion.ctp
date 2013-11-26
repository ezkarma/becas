<div class="users form" style="width:30%;margin-right:30%;" >
<h2>Asignacion de Becas</h2>

<?php
	
	$con = 0;
	foreach($becas as $beca){
		$con = $con + $beca['Fecha']['becas'];
	}
	
	echo '<br> El total de becas es: '.$con;
	
	echo '<br> El total de alumnos es: '.$total_alumnos;
	
	$asignacion = intval($con/$total_alumnos);
	
	echo '<br><br> El numero de becas por alumno es de: '.$asignacion;
	
	echo $this->Form->create('User', array(
    'inputDefaults' => array(
        'label' => false
    )
	));

echo $this->Form->input('dias_disp', array('value'=>$asignacion));


echo $this->Form->end(__('Asignar')); 

?>


</div>


</center>

 