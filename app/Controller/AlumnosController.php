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
}

?>