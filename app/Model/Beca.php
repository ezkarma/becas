<?php 

App::uses('AppModel', 'Model');

class Beca extends AppModel {

    public $name = 'Beca';
	
	public $belongsTo = array(
        'Alumno' => array(
            'className' => 'Alumno',
            'foreignKey' => 'alumno_matricula'
        ),
		 'Cafeteria' => array(
            'className' => 'Cafeteria',
            'foreignKey' => 'cafeteria_id'
        )
    );
}

?>