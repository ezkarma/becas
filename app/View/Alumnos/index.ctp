<?php 

echo 'Alumnos';

echo '<br>';

foreach($alumnos as $alumno){
echo $alumno['Alumno']['nombre'];
}

echo $this->Html->link('Regresar', array('action'=>'index'));
?>