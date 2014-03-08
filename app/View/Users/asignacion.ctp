<div class="container" style="width:60%">
    <div class="row">
        <div class="span3 centred">
<h2>Asignacion de Becas </h2>
<?php if($periodo['Periodo']['becas_disponibles']>0) { ?>
<h3>Existen <b><?php echo $periodo['Periodo']['becas_disponibles']?></b> Becas disponibles </h3><br>

Alumno: <?php echo $alumno['User']['nombre'].' '.$alumno['User']['apellidop'].' '.$alumno['User']['apellidom'] ?>
<br>Matricula: <?php echo $alumno['User']['username'] ?>
<br>Becas: <?php echo $alumno['User']['dias_disp'] ?>
<br><br>
<?php
echo $this->Form->create('Asignacion', array(
   'inputDefaults' => array(
        'label' => false,
        'div' => false
    )
));

?>
<?php
echo $this->Form->input('Becas',array('label'=>'Asignar Becas:', 'type' => 'textbox','class'=>'form-control'));
?>

<?php
echo $this->Form->submit('Agregar',array('class' => 'btn btn-danger')); 
?>

<?php } 
 else { ?>
<h3>No existen Becas disponibles para asignar </h3><br>
<?php } ?>

		
	</div>
</div>
</div>
	
	