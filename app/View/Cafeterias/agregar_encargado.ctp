<div class="container" style="width:30%">
    <div class="row">
        <div class="span3 centred">
		
<center><br><legend>Agregar Encargado de Cafeteria</legend>
<br>
<?php

echo $this->Form->create('CafeteriaEncargado', array(
    'inputDefaults' => array(
        'label' => false
    )
));
echo $this->Form->input('cafeteria_id', array('type'=>'hidden','label' => 'id','value' => $id,'class'=>'form-control'));
echo $this->Form->input('nombre', array('label' => 'Nombre','class'=>'form-control'));
echo $this->Form->input('telefono', array('label' => 'Telefono','class'=>'form-control'));
echo $this->Form->input('correo', array('label' => 'Correo Electronico','class'=>'form-control'));

?>
<br>
<?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-success')); ?>
</center>
 </div>
    </div>
</div>





