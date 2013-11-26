<h2>Sistema de Gestion de Becas Alimenticias de la UAI</h2>

<h3>Bienvenido
<?php
echo $usuario_registrado['nombre'];
?>
</h3>
<h4>Alumno</h4>

<h3>Usted tiene <?php echo $usuario_registrado['dias_disp'];?> dias disponibles</h3>

<br>
<?php
echo $this->Html->link("Solicitar Dia", array('controller' =>'users','action'=> 'agregar_jefe'));

echo '<br><br>';
echo $this->Html->link("Salir", array('controller' =>'users','action'=> 'logout'));

?>