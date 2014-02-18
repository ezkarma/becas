<?php

class GeneracionesController extends AppController {
    
	 function agregar(){
	 
	$this->set('carreras', $this->Generacion->Carrera->find('list'));
 	
		
		if($this->request->is('post')){
			
		if ($this->Generacion->save($this->request->data)) {
						
				$this->Session->setFlash('Se ha Guardado la Generacion Exitosamente');
				$this->redirect(array('controller'=>'admins','action'=>'index'));
			}
		
		}
	}
}

?>