<?php 

class Carrera extends AppModel {

    public $name = 'Carrera';
	var $displayField = 'nombre';
	
	public $hasMany = array(
        'User' => array(
            'className'    => 'User',
            'foreignKey'    => 'carrera_id'
         )
    );
}

?>