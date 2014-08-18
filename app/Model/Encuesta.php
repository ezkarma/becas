<?php 

class Encuesta extends AppModel {

    public $name = 'Encuesta';
	
	public $belongsTo = array(
        'Alumno' => array(
            'className' => 'Alumno',
            'foreignKey' => 'alumno_matricula'
        )
    );
	
	 public $validate = array(
        'pregunta5' => array(
            'required' => array(
                'rule' => 'numeric',
                'message' => 'Por favor introduzca una cantidad aproximada (utilizando solo numeros)'
            )
        ),
        'pregunta7' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Sea lo mas breve posible'
            )
        )
    );
	
}

?>