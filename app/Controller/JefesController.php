<?php
App::uses('User', 'Jefe');

class JefesController extends AppController {

    
    public function index() {
		
		 if ($this->Session->read('Auth.User.role') === 'jefe'){
			$this->set('usuario_registrado', $this->Auth->user());
		}
		
		else $this->redirect(array('action' => 'logout'));
    }

   public function logout() {
    return $this->redirect($this->Auth->logout());
	}
}

?>