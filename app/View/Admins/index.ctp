<div class="users form">
Bienvenido Admin

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

?>
</div>