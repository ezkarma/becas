<?php
App::uses('User','Jefe');

class AdminsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }
	
	public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirect());
        }
        $this->Session->setFlash(__('Invalid username or password, try again'));
    }
	}
	
	public function logout() {
    return $this->redirect($this->Auth->logout());
	}

    public function index() {
        //$this->Admin->recursive = 0;
       // $this->set('admins', $this->paginate());
	    if ($this->Session->read('Auth.User.role') === 'admin'){
	   $this->set('usuario_registrado', $this->Auth->user());
	   }
	   else $this->redirect(array('action' => 'logout'));
    }

    public function view($id = null) {
        $this->Admin->id = $id;
        if (!$this->Admin->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('admin', $this->Admin->read(null, $id));
    }

    public function agregar_jefe() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('El jefe de grupo ha sido almacenado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('El jefe de grupo no ha sido guardado. Por favor intente de nuevo'));
        }
    }
	
	public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
        }
    }
	
    public function edit($id = null) {
        $this->Admin->id = $id;
        if (!$this->Admin->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Admin->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

   
}

?>