<div class="container" style="width:80%">
    <div class="row">
        <div class="span3 centred">

<h2>Listado de Carreras</h2>
<style type="text/css">
div.inline { float:left; }
.clearBoth { clear:both; }
</style>

<br>
		<table class='table'>
		<th>Clave</th>
		<th>Carrera</th>
		<th><center>Numero de Alumnos</center></th>
	
	<?php
	foreach ($carreras as $carrera){
		echo '<tr>';
		echo '<td>'.$carrera['Carrera']['id'].'</td>';
		echo '<td>'.$carrera['Carrera']['nombre'].'</td>';
		echo '<td><center>'.$alumnos[$carrera['Carrera']['id']].'</center></td>';
		echo '</tr>';
	}
	?>
	</table>
	</div>
</div>
</div>
	
	