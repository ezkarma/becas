<?php

class EncuestasController extends AppController {

	var $uses = array('Encuesta');
	
	public function index(){
		if($this->request->is('post')){
		
		if ($this->Encuesta->save($this->request->data)) {
						
				$this->Session->setFlash('Se ha Guardado la encuesta Exitosamente','success');
				$this->redirect(array('controller'=>'encuestas','action'=>'index'));
			}
		
		}
	}
	
	public function evaluar(){
		$encuestas = $this->Encuesta->find('all');
		
		foreach ($encuestas as $encuesta){
			if($encuesta['Encuesta']['pregunta1']==1){
			echo $encuesta['Encuesta']['user_id'];
			$this->Encuesta->updateAll(array('resultado' =>5), array('Encuesta.user_id =' => $encuesta['Encuesta']['user_id']));
				
			}
		}
	}
}

?>