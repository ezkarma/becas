Agregar Carrera
<?php

echo $this->Form->create('Carrera', array(
    'inputDefaults' => array(
        'label' => false
    )
));

echo $this->Form->input('id',array('label' => 'Clave','type' => 'textbox'));
echo $this->Form->input('nombre', array('label' => 'Nombre de la Carrera'));

echo $this->Form->end(__('Guardar')); 

?>





