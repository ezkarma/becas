<h2>Sistema de Gestion de Becas Alimenticias de la UAI</h2>

<h3>Bienvenido
<?php
echo $usuario_registrado['nombre'];
?>
</h3>
<h4>Alumno</h4>

<h3>Usted tiene <?php echo $usuario_registrado['dias_disp'];?> dias disponibles</h3>
<?php
if ($usuario_registrado['dias_disp']<1){
echo '<h3>Lo sentimos pero usted no cuenta con mas becas disponibles.</h3>';
}
?>
<div class="span4" width="50%">
<table class="table">
<th>Fecha</th>
<th>Codigo</th>

<?php
foreach ($becas as $beca){
echo '<tr>';
echo '<td>'.$beca['Beca']['fecha'].'</td>';
echo '<td>'.$beca['Beca']['clave'].'</td>';
echo '</tr>';
}
?>

</table>
</div>

<br>
