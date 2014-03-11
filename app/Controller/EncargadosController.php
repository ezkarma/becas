<?php
App::uses('User', 'Encargado');

class EncargadosController extends AppController {
    	
	var $uses = array('User','Beca','Carrera','Fecha','Periodo');

    public function index() {
		
		 if ($this->Session->read('Auth.User.role') === 'encargado'){
		  
		$fecha = date('Y-m-d');
		
		$this->set('fecha',$fecha);
		
        $this->set('usuario_registrado', $this->Auth->user());
		$this->set('alumnos', $this->User->Beca->find('all', array('conditions' => array('Beca.fecha =' => $fecha))));
		$this->set('carreras',$this->Carrera->find('all'));
		
		
			if ($this->request->is('post')) {
				$matricula = $this->data['UserBusqueda']['username'];
				$this->set('alumnos', $this->User->Beca->find('all', array('conditions' => array('Beca.fecha =' => $fecha,'User.username LIKE' => '%'.$matricula.'%'))));
			}
			
			
				}
		else 
		$this->redirect(array('action' => 'logout'));
		

    }

   public function logout() {
    return $this->redirect($this->Auth->logout());
	}
	
	public function estadisticas(){
		$this->set('becas',$this->Periodo->Fecha->find('all',array('conditions' => array('Fecha.habil =' => true))));
	}
}

?>