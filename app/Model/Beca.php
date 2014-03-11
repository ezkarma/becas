<?php 

App::uses('AppModel', 'Model');

class Beca extends AppModel {

    public $name = 'Beca';
	
	public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );
}

?>