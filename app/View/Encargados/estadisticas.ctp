<h1>Sistema de Gestion de Becas Alimenticias de la UAI</h1>
<h2>Estadisticas</h2>
<br>


<div class="row">
	<div class="col-lg-2">	
	</div>
		<div class="col-lg-8">	

<table class='table'>
<th>Fecha</th>
<th>Becas Disponibles</th>
<th>Becas Otorgadas</th>

<?php 

foreach ($becas as $beca){
echo '<tr>';
echo '<td>'.$beca['Fecha']['fecha'].'</td>';
echo '<td>'.$beca['Fecha']['becas'].'</td>';
echo '</tr>';
}
?>
</table>
		
	</div>
</div>
</div>