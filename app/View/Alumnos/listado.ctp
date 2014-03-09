<div class="container" style="width:80%">
    <div class="row">
        <div class="span3 centred">

<h2>Listado de Alumnos</h2>
<style type="text/css">
div.inline { float:left; }
.clearBoth { clear:both; }
</style>

<?php
echo $this->Form->create('UserBusqueda', array(
   'inputDefaults' => array(
        'label' => false,
        'div' => false
    )
));

?>
<?php
echo $this->Form->input('username',array('label'=>'Matricula', 'type' => 'textbox','class'=>'form-control'));
?>

<?php
echo $this->Form->submit('Buscar',array('class' => 'btn btn-danger')); 
?>

<?php

?>


<br>
		<table class='table'>
		<th>Matricula</th>
		<th>Alumno</th>
		<th>Carrera</th>
		<th>Semestre</th>
		<th>Becas</th>
		<th></th>
	<?php
	foreach ($usuarios as $usuario){
		echo '<tr>';
		echo '<td>'.$usuario['User']['username'].'</td>';
		echo '<td>'.$usuario['User']['nombre'].' '.$usuario['User']['apellidop'].' '.$usuario['User']['apellidom'].'</td>';
		echo '<td>'.$usuario['Carrera']['nombre'].'</td>';
		echo '<td><center>'.$usuario['User']['semestre'].'</center></td>';
		echo '<td><center>'.$usuario['User']['dias_disp'].'</td>';
		echo '<td>'.$this->Html->link("+", array('controller' =>'users','action'=> 'asignacion/'.$usuario['User']['id']),array('class'=>'btn btn-warning btn-sm')).'</center></td>';
		echo '</tr>';
	}
	?>
	</table>
	</div>
</div>
</div>
	
	