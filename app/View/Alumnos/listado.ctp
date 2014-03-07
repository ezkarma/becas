<div class="container" style="width:60%">
    <div class="row">
        <div class="span3 centred">

<h2>Listado de Alumnos</h2>
<style type="text/css">
div.inline { float:left; }
.clearBoth { clear:both; }
</style>

<?php
echo $this->Form->create('UserBusqueda', array(
   'inputDefaults' => array(
        'label' => false,
        'div' => false
    )
));

?>
<?php
echo $this->Form->input('username',array('label'=>'Matricula', 'type' => 'textbox','class'=>'form-control'));
?>

<?php
echo $this->Form->submit('Buscar',array('class' => 'btn btn-success')); 
?>

<?php

?>


<br>
		<table class='table'>
		<th>Matricula</th>
		<th>Alumno</th>
		<th>Fecha Otorgada</th>
		<th>Reasignar</th>
		<th>Eliminar</th>
		
	<?php
	foreach ($usuarios as $usuario){
		echo '<tr>';
		echo '<td>'.$usuario['User']['username'].'</td>';
		echo '<td>Nombre del Alumno</td>';
		//echo '<td>'.$usuario['Beca']['fecha'].'</td>';
		echo '<td>'.$this->Html->link("Reasignar", array('controller' =>'becas','action'=> 'reasignar_beca/'.$usuario['User']['username'].'/'.$usuario['User']['id'])).'</td>';
		echo '<td>'.$this->Html->link("Eliminar", array('controller' =>'becas','action'=> 'eliminar_beca/'.$usuario['User']['id']),array(),'¿Esta seguro que desea eliminar esta beca?').'</td>';
		echo '</tr>';
	}
	?>
	</table>
	</div>
</div>
</div>
	
	