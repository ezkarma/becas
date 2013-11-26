<?php 

class Carrera extends AppModel {

    public $name = 'Carrera';
	var $displayField = 'nombre';
	
	public $hasMany = array(
        'Generacion' => array(
            'className'    => 'Generacion',
            'foreignKey'    => 'carrera_id'
         )
    );
}

?>