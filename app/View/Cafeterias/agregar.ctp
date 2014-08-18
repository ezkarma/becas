<div class="container" style="width:30%">
    <div class="row">
        <div class="span3 centred">
		
<center><h2>Agregar Cafeteria</h2></center>
<br>
<?php

echo $this->Form->create('Cafeteria', array(
    'inputDefaults' => array(
        'label' => false
    )
));
echo $this->Form->input('nombre', array('label' => 'Nombre de la Cafeteria','class'=>'form-control'));
echo $this->Form->input( 'hora_apertura', array('label'=>'Hora de Apertura &nbsp','type' => 'select',
        'options' => 
		array('6:00 AM' => '6:00 AM', 
				'6:30 AM' => '6:30 AM', 
				'7:00 AM' => '7:00 AM', 
				'7:30 AM' => '7:30 AM', 
				'8:00 AM' => '8:00 AM', 
				'8:30 AM' => '8:30 AM', 
				'9:00 AM' => '9:00 AM',)));
echo $this->Form->input( 'hora_cierre', array('label'=>'Hora de Cierre &nbsp','type' => 'select',
        'options' => 
		array('3:00 PM' => '3:00 PM', 
				'3:30 PM' => '3:30 PM', 
				'4:00 PM' => '4:00 PM', 
				'5:30 PM' => '5:30 PM', 
				'6:00 PM' => '6:00 PM', 
				'7:30 PM' => '7:30 PM', 
				'8:00 PM' => '8:00 PM',)));
		
echo $this->Form->input('becas_otorgar', array('label' => 'Numero de Becas que otorga','class'=>'form-control'));
?>
<br>
<center>
<?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-success')); ?>
</center>
 </div>
    </div>
</div>





