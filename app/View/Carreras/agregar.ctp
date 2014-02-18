<div class="container" style="width:30%">
    <div class="row">
        <div class="span3 centred">
		
<h2>Agregar Carrera</h2>
<br>
<?php

echo $this->Form->create('Carrera', array(
    'inputDefaults' => array(
        'label' => false
    )
));

echo $this->Form->input('id',array('label' => 'Clave','type' => 'textbox','class'=>'form-control'));
echo $this->Form->input('nombre', array('label' => 'Nombre de la Carrera','class'=>'form-control'));
?>
<br>
<center>
<?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-success')); ?>
</center>
 </div>
    </div>
</div>





