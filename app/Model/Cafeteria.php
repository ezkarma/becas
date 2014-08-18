<?php 

App::uses('AppModel', 'Model');

class Cafeteria extends AppModel {

    public $name = 'Cafeteria';
    var $displayField = 'nombre';
	
	public $hasMany = array(
        'CafeteriaEncargado' => array(
            'className'    => 'CafeteriaEncargado',
            'foreignKey'    => 'cafeteria_id'
         ),
		 'Beca' => array(
            'className'    => 'Beca',
            'foreignKey'    => 'cafeteria_id'
         )
    );
	
}

?>