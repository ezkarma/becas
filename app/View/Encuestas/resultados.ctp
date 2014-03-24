<div class="row">
	<div class="col-lg-2">	
	</div>
		<div class="col-lg-8">	        

<h2>Resultado de las Encuestas</h2>
<style type="text/css">
div.inline { float:left; }
.clearBoth { clear:both; }
</style>

<div class="col-lg-2">
</div>
<div class="col-lg-2"><h3>Matricula</h3><br></div>
<div class="col-lg-4">	
<?php
echo $this->Form->create('UserBusqueda', array(
   'inputDefaults' => array(
        'label' => false,
        'div' => false
    )
));
echo '<br>';
echo $this->Form->input('username',array('type' => 'textbox','class'=>'form-control'));
?>
</div>

<div class="col-lg-4">	
<?php
echo '<br>';
echo $this->Form->submit('Buscar',array('class' => 'btn btn-success')); 
?>
</div>

		<table class='table'>
		<th>Matricula</th>
		<th>Alumno</th>
		<th>Carrera</th>
		<th>Semestre</th>
		<th>Calificacion</th>
		<th></th>
	<?php
	foreach ($usuarios as $usuario){
		echo '<tr>';
		echo '<td>'.$usuario['User']['username'].'</td>';
		echo '<td>'.$usuario['User']['nombre'].' '.$usuario['User']['apellidop'].' '.$usuario['User']['apellidom'].'</td>';
		echo '<td>Carrera</td>';
		echo '<td><center>'.$usuario['User']['semestre'].'</center></td>';
		//echo '<td><center>'.$usuario['User']['dias_disp'].'</td>';
		echo '<td><center>'.$usuario['Encuesta']['resultado'].'</td>';
		//echo '<td>'.$this->Html->link("+", array('controller' =>'users','action'=> 'asignacion/'.$usuario['User']['id']),array('class'=>'btn btn-warning btn-sm')).'</center></td>';
		echo '</tr>';
	}
	?>
	</table>
	</div>
</div>
</div>
	
	