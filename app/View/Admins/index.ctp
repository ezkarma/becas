
<h2><font color='000066'>Sistema de Gestion de Becas Alimenticias de la UAI</font></h2>

<h3>Bienvenido
<?php
echo $usuario_registrado['username'];
?>
</h3>
<h4>Administrador</h4>

<br>
<?php

echo $this->Html->link("Generar Periodo de Becas", array('controller' =>'periodos','action'=> 'agregar'));

?>
