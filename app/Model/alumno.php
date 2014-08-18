<?php 

App::uses('AppModel', 'Model');

class Alumno extends AppModel {

    public $name = 'Alumno';
	public $primaryKey = 'matricula';
	
	public $hasMany = array(
        'Beca' => array(
            'className'    => 'Beca',
            'foreignKey'    => 'alumno_matricula'
         ),
        'Encuesta' => array(
            'className'    => 'Encuesta',
            'foreignKey'    => 'alumno_matricula'
         )
    );
	
	public $belongsTo = array(
        'Carrera' => array(
            'className' => 'Carrera',
            'foreignKey' => 'carrera_id'
        )
    );
	
}

?>