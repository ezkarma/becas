<?php 
// app/Controller/UsersController.php
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
	
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect(array('controller' => 'users', 'action' => 'index'));
			}
			$this->Session->setFlash(__('Invalid username or password, try again'));
		}
	}

public function logout() {
    return $this->redirect($this->Auth->logout());
}


    public function index() {
	
		
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
			
		$this->set('usuarios', $this->User->find('all'));
		
		$this->set('usuario_registrado', $this->Auth->user());
		
		$usuario= $this->Auth->user();
		
		if ($usuario['role']=='jefe') {
			return $this->redirect(array('controller' => 'jefes', 'action' => 'index'));
		}
		
		else if ($usuario['role']=='admin') {
		$this->set('admin', $this->Auth->user());
			return $this->redirect(array('controller' => 'admins', 'action' => 'index'));
		}
		
		else if ($usuario['role']=='alumno') {
		$this->set('admin', $this->Auth->user());
			return $this->redirect(array('controller' => 'alumnos', 'action' => 'index'));
		}
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }
	
	public function lista_alumnos(){
		$this->set('alumnos', $this->User->find('all', array('conditions' => array('User.role' => 'alumno'))));
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
	
	public function agregar_jefe() {
	
	$this->set('generaciones', $this->User->Generacion->find('list'));
	
	
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('El jefe de grupo ha sido guardado'));
                return $this->redirect(array('controller' =>'admins','action' => 'index'));
            }
            $this->Session->setFlash(__('El jefe de grupo no pudo ser guardado. Por favor intente nuevamente'));
        }
    }
	
	public function agregar_encargado() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('El encargado de cafeteria ha sido guardado'));
                return $this->redirect(array('controller' =>'admins','action' => 'index'));
            }
            $this->Session->setFlash(__('El encargado de cafeteria no pudo ser guardado. Por favor intente nuevamente'));
        }
    }
	
	public function agregar_alumno() {
	
		$this->set('generaciones', $this->User->Generacion->find('list'));
		
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('El alumno ha sido guardado'));
                return $this->redirect(array('controller' =>'admins','action' => 'index'));
            }
            $this->Session->setFlash(__('El alumno no pudo ser guardado. Por favor intente nuevamente'));
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
}
?>