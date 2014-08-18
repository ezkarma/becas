<center>
<h3>Bienvenid@
<?php
echo $usuario_registrado['Alumno']['nombre'];
?>
</h3>
<h4>Alumno</h4>
</center>
<?php 
if ($usuario_registrado['Alumno']['encuesta'] == 0){
echo '<br>';
echo '<div class="col-lg-2">';
echo '</div>';
echo '<div class="col-lg-8">';
echo '<legend> Bienvenido al Sistema de Becas Alimenticias, para comenzar es necesario que conteste la siguiente encuesta Socioeconomica</legend>';
echo '<center>'.$this->Html->link("Realizar Encuesta", array('controller' =>'encuestas','action'=> 'index'),array('class'=>'btn btn-primary btn-lg')).'</center>';
echo '</div>';
} 
elseif($usuario_registrado['Alumno']['encuesta'] == 1 && $usuario_registrado['Alumno']['aceptado'] == 0){
echo '<br>';
echo '<div class="col-lg-2">';
echo '</div>';
echo '<div class="col-lg-8">';
echo '<legend><center>Su solicitud se encuentra en tramite. Favor de Esperar unos dias. Gracias</center></legend>';
echo '</div>';
}
else { ?>
<div class="col-lg-2">
</div>
<div class="col-lg-8">
<h3>Usted tiene <?php echo $usuario_registrado['Alumno']['dias_disp'];?> dias disponibles</h3>
<?php
if ($usuario_registrado['Alumno']['dias_disp']<1){
echo '<h3>Lo sentimos pero usted no cuenta con mas becas disponibles.</h3>';
}
?>
<table class="table">
<th>Fecha</th>
<th>Cafeteria</th>
<th>Codigo</th>

<?php
foreach ($becas as $beca){
echo '<tr>';
echo '<td>'.$beca['Beca']['fecha'].'</td>';
echo '<td>'.$beca['Cafeteria']['nombre'].'</td>';
echo '<td>'.$beca['Beca']['clave'].'</td>';
echo '</tr>';
}
?>
</table>
<?php
if($usuario_registrado['Alumno']['dias_disp']>0){
$icono = $this->Html->tag('span', ' ', array('class'=>'glyphicon glyphicon-user'));
echo '<br><center>'.$this->Html->link("Solicitar Beca", array('controller' =>'becas','action'=> 'calendario'),array('class'=>'btn btn-success btn-sm','escape'=>false)).'<center>';
}
?>
</div>
<br>

<?php } ?>
