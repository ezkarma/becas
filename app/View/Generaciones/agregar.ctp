Agregar Generacion
<?php

echo $this->Form->create('Generacion', array(
    'inputDefaults' => array(
        'label' => false
    )
));

echo $this->Form->input('id',array('label' => 'Clave','type' => 'textbox'));
echo $this->Form->input('nombre', array('label' => 'Nombre de la Generacion'));
echo $this->Form->input('carrera_id');


echo $this->Form->end(__('Guardar')); 

?>





