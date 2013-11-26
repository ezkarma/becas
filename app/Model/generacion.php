<?php 

class Generacion extends AppModel {

	public $name = 'Generacion';
	var $displayField = 'nombre';
	
	public $belongsTo = array(
        'Carrera' => array(
            'className' => 'Carrera',
            'foreignKey' => 'carrera_id'
        )
    );
	
	public $hasMany = array(
        'User' => array(
            'className'    => 'User',
            'foreignKey'    => 'generacion_id'
         )
    );
	 
}

?>