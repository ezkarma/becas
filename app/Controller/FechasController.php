<?php

class FechasController extends AppController {

   var $uses = array('Fecha','User','Alumno');
   
	 function verificacion(){
		$this->Fecha->query('TRUNCATE fechas;');
		
		$this->set('periodos', $this->Fecha->Periodo->find('first', array('order' => array('id' => 'desc'))));
		if($this->request->is('post')){
		
		if ($this->Fecha->saveMany($this->request->data['Fecha'])) {
				
				//$this->Session->setFlash('Seleccione el numero de becas que se le asignara a cada alumno');
				$this->redirect(array('controller'=>'fechas','action'=>'asignacion'));
				
			}
	
		}
	 }
	 
	 function asignacion(){
				
		$this->set('becas', $this->Fecha->find('all', array('conditions' => array('Fecha.fecha !=' => '0000-00-00'))));
		$this->set('total_alumnos', $this->Alumno->find('count',array('conditions' => array('Alumno.aceptado =' => true))));
				
		if($this->request->is('post')){
				
								
				if($this->Alumno->updateAll(array('Alumno.dias_disp' =>"'" . $this->request->data['Alumno']['dias_disp'] . "'"),array('Alumno.aceptado'=>true))){
					
				$this->Session->setFlash('El periodo de becas alimenticias ha sido generado exitosamente','success');
				$this->redirect(array('controller'=>'users','action'=>'index'));
				
				}		
		
		}
			 
	 }
   
}

?>