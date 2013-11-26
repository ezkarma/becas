<?php 


class Periodo extends AppModel {

    public $name = 'Periodo';
	
	public $hasMany = array(
        'Fecha' => array(
            'className'    => 'Fecha',
            'foreignKey'    => 'periodo_id'
         )
    );
}

?>