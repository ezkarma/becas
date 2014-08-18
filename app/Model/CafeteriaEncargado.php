<?php 

App::uses('AppModel', 'Model');

class CafeteriaEncargado extends AppModel {
  
	public $belongsTo = array(
        'Cafeteria' => array(
            'className' => 'Cafeteria',
            'foreignKey' => 'cafeteria_id'
        )
    );
	
	  
}

?>