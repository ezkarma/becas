<?php

class CarrerasController extends AppController {

	var $uses = array('Carrera','User');

    function agregar(){
		if($this->request->is('post')){
		
		if ($this->Carrera->save($this->request->data)) {
						
				$this->Session->setFlash('Se ha Guardado la Carrera Exitosamente','success');
				$this->redirect(array('controller'=>'admins','action'=>'index'));
			}
		
		}
	}
	
	public function index(){
	
		$carreras = $this->Carrera->find('all');
		$this->set('carreras', $carreras);
		
		foreach($carreras as $carrera){
			
			$alumnos[$carrera['Carrera']['id']] = $this->User->find('count', array('conditions' => array('User.carrera_id =' => $carrera['Carrera']['id'])));
		}
		
		$this->set('alumnos',$alumnos);
		
		}
   
}

?>