<?php 

class Carrera extends AppModel {

    public $name = 'Carrera';
	var $displayField = 'nombre';
	
	public $hasMany = array(
        'Alumno' => array(
            'className'    => 'Alumno',
            'foreignKey'    => 'carrera_id'
         )
    );
}

?>