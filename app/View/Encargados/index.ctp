<center>
<h2></span> Cafeteria "<?php echo $encargado['Cafeteria']['nombre'] ?>"</h2>
<h3>Encargado: <?php echo $encargado['CafeteriaEncargado']['nombre'];?><h3>

<h3>Becas solicitadas para el dia <b><?php echo $dia.' '.$datemonth.' de '.$mes?></b></h3>
<br>
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
echo '<td>'.$alumno['Alumno']['matricula'].'</td>';
echo '<td>'.$alumno['Alumno']['nombre'].' '.$alumno['Alumno']['apellidop'].' '.$alumno['Alumno']['apellidom'].'</td>';
// echo '<td>'.$carreras[$alumno['Alumno']['carrera_id']]['Carrera']['nombre'].'</td>';
echo '<td></td>';
echo '<td>'.$alumno['Alumno']['semestre'].'</td>';
if ($alumno['Beca']['otorgada']==false) echo '<td>'.$this->Html->link("Otorgar", array('controller' =>'becas','action'=> 'otorgar/'.$alumno['Beca']['alumno_matricula'])).'</td>';
else echo '<td>Otorgada</td>';
echo '</tr>';
}
?>
</table>
		
	</div>
</div>
</div>
<center>