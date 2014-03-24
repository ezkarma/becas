<?php 

class Encuesta extends AppModel {

    public $name = 'Encuesta';
	
	public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );
	
}

?>