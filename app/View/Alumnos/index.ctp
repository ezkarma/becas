<center>
<h3>Bienvenido
<?php
echo $usuario_registrado['nombre'];
?>
</h3>
<h4>Alumno</h4>
</center>
<?php 
if ($usuario_registrado['encuesta'] == 0){
echo '<br>';
echo '<div class="col-lg-2">';
echo '</div>';
echo '<div class="col-lg-8">';
echo '<legend> Bienvenido al Sistema de Becas Alimenticias, para comenzar es necesario que conteste la siguiente encuesta Socioeconomica</legend>';
echo '<center>'.$this->Html->link("Realizar Encuesta", array('controller' =>'encuestas','action'=> 'index'),array('class'=>'btn btn-primary btn-lg')).'</center>';
echo '</div>';
} 
elseif($usuario_registrado['encuesta'] == 1 && $usuario_registrado['aceptado'] == 0){
echo '<br>';
echo '<div class="col-lg-2">';
echo '</div>';
echo '<div class="col-lg-8">';
echo '<legend> Su solicitud se encuentra en tramite. Favor de Esperar unos dias. Gracias</legend>';
echo '</div>';
}
else { ?>
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

<?php } ?>
