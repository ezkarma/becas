<?php

class PeriodosController extends AppController {

var $uses = array('Periodo','Cafeteria');

    function agregar(){
		
		$cafeterias = $this->Cafeteria->find('all');
		$becas = 0;
		foreach($cafeterias as $cafeteria){
			$becas += $cafeteria['Cafeteria']['becas_otorgar'];
		}
		
		$this->set('becas',$becas);
		
		if($this->request->is('post')){
		
		$this->Periodo->updateAll(array('Periodo.activo'=>0));
		
		if ($this->Periodo->save($this->request->data)) {
				$this->Session->setFlash('Se ha Guardado el perido Exitosamente', 'default', array(), 'good');
				$this->Session->setFlash('Seleccione los dias habiles del Periodo','success');
				$this->redirect(array('controller'=>'fechas','action'=>'verificacion'));
				
			}
		}
	}
	
	 function verificacion(){
	 
		
		$this->set('periodo', $this->Periodo->find('first', array('order' => array('id' => 'desc'))));
		
		if($this->request->is('post')){
		
			
		if ($this->Fecha->saveMany($this->request->data['Fecha'])) {
						
				//$this->Session->setFlash('Se ha Guardado el perido Exitosamente', 'default', array(), 'good');
				//$this->Session->setFlash('Seleccione los dias habiles del Periodo','success');
				$this->redirect(array('controller'=>'periodos','action'=>'verificacion'));
				
			}
	
		}
	 }
   
}

?>