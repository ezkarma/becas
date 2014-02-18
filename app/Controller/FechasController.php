<?php

class FechasController extends AppController {

   var $uses = array('Fecha','User');
   
	 function verificacion(){
	 
		
		$this->set('periodos', $this->Fecha->Periodo->find('first', array('order' => array('id' => 'desc'))));
		
		if($this->request->is('post')){
		
			
		if ($this->Fecha->saveMany($this->request->data['Fecha'])) {
				
				if($this->request->data['Fecha.1.fecha']=='0000-00-00') echo 'Hola';
						
				$this->Session->setFlash('Seleccione los dias habiles del Periodo');
				$this->redirect(array('controller'=>'fechas','action'=>'asignacion'));
				
			}
	
		}
	 }
	 
	 function asignacion(){
		
		$this->set('becas', $this->Fecha->find('all', array('conditions' => array('Fecha.fecha !=' => '0000-00-00'))));
		$this->set('total_alumnos', $this->User->find('count',array('conditions' => array('User.role =' => 'alumno'))));
				
		if($this->request->is('post')){
				
								
				if($this->User->updateAll(array('User.dias_disp' =>"'" . $this->request->data['User']['dias_disp'] . "'"),array('User.role' => 'alumno'))){
					
				$this->Session->setFlash('Los dias fueron asignados');
				$this->redirect(array('controller'=>'users','action'=>'index'));
				
				}		
		
		}
			 
	 }
   
}

?>