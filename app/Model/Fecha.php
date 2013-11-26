<?php 


class Fecha extends AppModel {

    public $name = 'Fecha';
	
	public $belongsTo = array(
        'Periodo' => array(
            'className' => 'Periodo',
            'foreignKey' => 'periodo_id'
        )
    );
	
}

?>