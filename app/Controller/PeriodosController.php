<?php

class PeriodosController extends AppController {

    function agregar(){
		if($this->request->is('post')){
		
		//echo $this->request->data;
		if ($this->Periodo->save($this->request->data)) {
						
				//$this->Session->setFlash('Se ha Guardado el perido Exitosamente', 'default', array(), 'good');
				$this->Session->setFlash('Seleccione los dias habiles del Periodo');
				$this->redirect(array('controller'=>'fechas','action'=>'verificacion'));
				
			}
		
		}
	}
	
	 function verificacion(){
	 
		
		$this->set('periodo', $this->Periodo->find('first', array('order' => array('id' => 'desc'))));
		
		if($this->request->is('post')){
		
			
		if ($this->Fecha->saveMany($this->request->data['Fecha'])) {
						
				//$this->Session->setFlash('Se ha Guardado el perido Exitosamente', 'default', array(), 'good');
				$this->Session->setFlash('Seleccione los dias habiles del Periodo');
				$this->redirect(array('controller'=>'periodos','action'=>'verificacion'));
				
			}
	
		}
	 }
   
}

?>