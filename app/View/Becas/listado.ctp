<!-- app/View/Users/add.ctp -->

<h2>Listado de Becas Disponibles</h2>

<h3>Bienvenido
<?php
echo $usuario_registrado['nombre'];
?>
</h3>

<table class="table table-striped table-hover table-bordered">
<th class="success">Fecha</th>
<th class="success">Becas Disponibles</th>
<th class="success">Solicitud</th>

<?php 
foreach($becas as $beca){
echo '<tr>';
echo '<td>'.$beca['Fecha']['fecha'].'</td>';
echo '<td>'.$beca['Fecha']['becas'].'</td>';
if($beca['Fecha']['becas']>0){
echo '<td>'.$this->Html->link("Solicitar", array('controller' =>'becas','action'=> 'solicitar/'.$beca['Fecha']['fecha'])).'</td>';
}
else {
echo '<td>No hay Becas Disponibles</td>';
}
echo '</tr>';
}
?>
</table>