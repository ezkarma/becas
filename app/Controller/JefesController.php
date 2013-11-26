<?php
App::uses('User', 'Jefe');

class JefesController extends AppController {

    
    public function index() {
        $this->set('usuario_registrado', $this->Auth->user());
    }

   
}

?>