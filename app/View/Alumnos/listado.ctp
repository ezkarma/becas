<div class="row">
	<div class="col-lg-2">	
	</div>
		<div class="col-lg-8">	        

<center><h2>Listado de Alumnos</h2></center>
<style type="text/css">
div.inline { float:left; }
.clearBoth { clear:both; }
</style>

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

<div class="col-lg-1">	
<?php
echo '<br>';
echo $this->Form->submit('Buscar',array('class' => 'btn btn-success')); 
?>
</div>

<div class="col-lg-2">	
<?php
$icono = $this->Html->tag('span', ' ', array('class'=>'glyphicon glyphicon-user'));
echo '<br><center>'.$this->Html->link($icono." Aceptados", array('controller' =>'alumnos','action'=> 'aceptados'),array('class'=>'btn btn-success btn-sm','escape'=>false)).'<center>';
?>
</div>

<div class="col-lg-1">
<?php
$icono = $this->Html->tag('span', ' ', array('class'=>'glyphicon glyphicon-list'));
echo '<br>'.$this->Html->link($icono." Importar Lista de Alumnos", array('controller' =>'alumnos','action'=> 'importar'),array('class'=>'btn btn-primary btn-sm','escape'=>false));
?>
</div>


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
		echo '<td>'.$usuario['Alumno']['matricula'].'</td>';
		echo '<td>'.$usuario['Alumno']['nombre'].' '.$usuario['Alumno']['apellidop'].' '.$usuario['Alumno']['apellidom'].'</td>';
		echo '<td>'.$usuario['Carrera']['nombre'].'</td>';
		echo '<td><center>'.$usuario['Alumno']['semestre'].'</center></td>';
		echo '<td><center>'.$usuario['Alumno']['dias_disp'].'</td>';
		echo '<td>'.$this->Html->link("+", array('controller' =>'users','action'=> 'asignacion/'.$usuario['Alumno']['matricula']),array('class'=>'btn btn-warning btn-sm')).'</center></td>';
		echo '</tr>';
	}
	?>
	</table>
	</div>
</div>
</div>
	
	