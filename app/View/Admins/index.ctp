
<h2>Sistema de Gestion de Becas Alimenticias de la UAI</h2>

<h3>Bienvenido
<?php
echo $usuario_registrado['username'];
?>
</h3>
<h1>Administrador</h1>

<br>
<?php
echo $this->Html->link("Agregar Jefe de Grupo", array('controller' =>'users','action'=> 'agregar_jefe'));
echo '<br>';
echo $this->Html->link("Agregar Encargado de Cafeteria", array('controller' =>'users','action'=> 'agregar_encargado'));
echo '<br>';
echo $this->Html->link("Agregar Alumno", array('controller' =>'users','action'=> 'agregar_alumno'));

echo '<br><br>';
echo $this->Html->link("Agregar Carrera", array('controller' =>'carreras','action'=> 'agregar'));
echo '<br>';
echo $this->Html->link("Agregar Generacion", array('controller' =>'generaciones','action'=> 'agregar'));

echo '<br><br>';
echo $this->Html->link("Generar Periodo de Becas", array('controller' =>'periodos','action'=> 'agregar'));

echo '<br><br>';
echo $this->Html->link("Salir", array('controller' =>'users','action'=> 'logout'));

?>
