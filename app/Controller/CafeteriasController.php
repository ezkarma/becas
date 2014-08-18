<?php

class CafeteriasController extends AppController {

var $uses = array('Cafeteria','User', 'CafeteriaEncargado');
    
    public function index() {
		$cafeterias = $this->Cafeteria->find('all');
		$this->set('cafeterias',$cafeterias);	
    }
	
	public function encargados($cafeteriaId) {
		$cafeteria = $this->Cafeteria->find('first',array('conditions'=>array('Cafeteria.id'=>$cafeteriaId)));
		$this->set('cafeteria',$cafeteria);	
		
		$encargados = $this->Cafeteria->CafeteriaEncargado->find('all',array('conditions'=>array('CafeteriaEncargado.cafeteria_id'=>$cafeteriaId)));
		$this->set('encargados',$encargados);	
    }
	
	function agregar(){
		if($this->request->is('post')){
		
		if ($this->Cafeteria->save($this->request->data)) {
						
				$this->Session->setFlash('Se ha Guardado la Cafeteria Exitosamente','success');
				$this->redirect(array('controller'=>'cafeterias','action'=>'index'));
			}
		
		}
	}
	
	function agregar_encargado($cafeteriaId){
		
		$this->set('id',$cafeteriaId);
		
		if($this->request->is('post')){
		
		$this->Cafeteria->CafeteriaEncargado->create();
		if ($this->Cafeteria->CafeteriaEncargado->save($this->request->data)) {
			
			$this->User->create();
			$this->request->data['User']['username'] = $this->data['CafeteriaEncargado']['correo'];
			$this->request->data['User']['password'] = $this->data['CafeteriaEncargado']['correo'];
			$this->request->data['User']['role'] = 'encargado';
			$this->User->save($this->request->data);	
			
			$this->Session->setFlash('Se ha Guardado el Encargado de Cafeteria Exitosamente','success');
			$this->redirect(array('controller'=>'cafeterias','action'=>'encargados/'.$cafeteriaId));
			}
		
		}
	}
	

}

?>