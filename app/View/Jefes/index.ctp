<!-- app/View/Users/add.ctp -->

<h2>Sistema de Gestion de Becas Alimenticias de la UAI</h2>

<h3>Bienvenido
<?php
echo $usuario_registrado['nombre'];
?>
</h3>
<h1>Jefe de Grupo</h1>

<br>
<?php
echo $this->Html->link("Agregar Alumno", array('controller' =>'users','action'=> 'agregar_alumno'));
echo '<br>';

echo $this->Html->link("Ver Lista de Alumnos", array('controller' =>'users','action'=> 'lista_alumnos'));
echo '<br>';
echo '<br>';

echo $this->Html->link("Salir", array('controller' =>'users','action'=> 'logout'));


?>