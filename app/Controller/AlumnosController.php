<?php

class AlumnosController extends AppController {

var $uses = array('User','Beca');

    public function index() {
    
	 if ($this->Session->read('Auth.User.role') === 'alumno'){
	
		$usuario = $this->Auth->user();
		$this->set('usuario_registrado', $this->Auth->user());
		$this->set('becas', $this->Beca->find('all', array('conditions' => array('Beca.username =' => $usuario['username']))));
		}
		
		else $this->redirect(array('action' => 'logout'));
    }
	
	public function logout() {
    return $this->redirect($this->Auth->logout());
	}
	
	public function listado() {
	if ($this->Session->read('Auth.User.role') === 'admin'){
		$this->set('usuario_registrado', $this->Auth->user());
		$this->set('usuarios', $this->User->find('all'));
		
		if ($this->request->is('post')) {
		//For when you need a specific field
			$matricula = $this->data['UserBusqueda']['username'];
		//	
			$this->set('usuarios', $this->User->find('all', array('conditions' => array('User.username LIKE' => '%'.$matricula.'%'))));
		}
	}
	else $this->redirect(array('action' => 'index'));
	}
}

?>