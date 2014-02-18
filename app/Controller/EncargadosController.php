<?php
App::uses('User', 'Encargado');

class EncargadosController extends AppController {
    	
	var $uses = array('User','Beca');

    public function index() {
		
		 if ($this->Session->read('Auth.User.role') === 'encargado'){
		  
		$fecha = date('Y-m-d');
		
		$this->set('fecha',$fecha);
		
        $this->set('usuario_registrado', $this->Auth->user());
		$this->set('becas', $this->Beca->find('all', array('conditions' => array('Beca.fecha =' => $fecha))));
		
		}
		
		else $this->redirect(array('action' => 'logout'));

    }

   public function logout() {
    return $this->redirect($this->Auth->logout());
	}
}

?>