<!-- app/View/Users/add.ctp -->

<h2>Sistema de Gestion de Becas Alimenticias de la UAI</h2>

<h3>Bienvenido
<?php
echo $usuario_registrado['nombre'];
?>
</h3>
<h1>Encargado de Cafeteria</h1>

<br>
<h3>Becas disponibles para el dia <?php echo $fecha?></h3>
<table class='table'>
<th>Usuario</th>
<th>Estado</th>
<?php 

foreach ($becas as $beca){
echo '<tr>';
echo '<td>'.$beca['Beca']['username'].'</td>';
if ($beca['Beca']['otorgada']==false) echo '<td>'.$this->Html->link("Otorgar", array('controller' =>'becas','action'=> 'otorgar/'.$beca['Beca']['username'])).'</td>';
else echo '<td>Otorgada</td>';
echo '</tr>';
}
?>
</table>

<?php
echo $this->Html->link("Salir", array('controller' =>'users','action'=> 'logout'));


?>