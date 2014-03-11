<h1>Sistema de Gestion de Becas Alimenticias de la UAI</h1>
<h2></span> Cafeteria</h2>
<br>
<h3>Bienvenido
<?php
echo $usuario_registrado['nombre'];
?>
</h3>
<br>

<div class="row">
	<div class="col-lg-2">	
	</div>
		<div class="col-lg-8">		
	
<h3>Becas disponibles para el dia <?php echo $fecha?></h3>
<br>
<table class='table'>
<th>Matricula</th>
<th>Nombre</th>
<th>Programa Educativo</th>
<th>Semestre</th>
<th>Estado</th>
<?php 

foreach ($becas as $beca){
echo '<tr>';
echo '<td>'.$beca['User']['username'].'</td>';
echo '<td>'.$beca['User']['nombre'].' '.$beca['User']['apellidop'].' '.$beca['User']['apellidom'].'</td>';
echo '<td>'.$carreras[$beca['User']['carrera_id']]['Carrera']['nombre'].'</td>';
echo '<td>'.$beca['User']['semestre'].'</td>';
if ($beca['Beca']['otorgada']==false) echo '<td>'.$this->Html->link("Otorgar", array('controller' =>'becas','action'=> 'otorgar/'.$beca['Beca']['user_id'])).'</td>';
else echo '<td>Otorgada</td>';
echo '</tr>';
}
?>
</table>
		
	</div>
</div>
</div>