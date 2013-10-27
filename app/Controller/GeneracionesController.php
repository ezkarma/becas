<?php

class GeneracionesController extends AppController {
    
	 function agregar(){
		if($this->request->is('post')){
		
		if ($this->Carrera->save($this->request->data)) {
						
				$this->Session->setFlash('Se ha Guardado la Carrera Exitosamente','success');
				$this->redirect(array('action'=>'agregar'));
			}
		
		}
	}
}

?>