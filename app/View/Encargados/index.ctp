<h1>Sistema de Gestion de Becas Alimenticias de la UAI</h1>
<h2></span> Cafeteria</h2>
<br>
<h3>Bienvenido
<?php
echo $usuario_registrado['nombre'];
?>
</h3>
<br>
<h3>Becas disponibles para el dia <?php echo $fecha?></h3>

<div class="row">
	<div class="col-lg-2">	
	</div>
		<div class="col-lg-8">	

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
<th>Nombre</th>
<th>Programa Educativo</th>
<th>Semestre</th>
<th>Estado</th>
<?php 

foreach ($alumnos as $alumno){
echo '<tr>';
echo '<td>'.$alumno['User']['username'].'</td>';
echo '<td>'.$alumno['User']['nombre'].' '.$alumno['User']['apellidop'].' '.$alumno['User']['apellidom'].'</td>';
echo '<td>'.$carreras[$alumno['User']['carrera_id']-1]['Carrera']['nombre'].'</td>';
echo '<td>'.$alumno['User']['semestre'].'</td>';
if ($alumno['Beca']['otorgada']==false) echo '<td>'.$this->Html->link("Otorgar", array('controller' =>'becas','action'=> 'otorgar/'.$alumno['Beca']['user_id'])).'</td>';
else echo '<td>Otorgada</td>';
echo '</tr>';
}
?>
</table>
		
	</div>
</div>
</div>