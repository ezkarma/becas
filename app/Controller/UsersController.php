<?php 
// app/Controller/UsersController.php
class UsersController extends AppController {

var $uses = array('User','Beca','Periodo');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
	
	public function login() {
	//echo AuthComponent::password('admin');
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect(array('controller' => 'users', 'action' => 'index'));
			}
			$this->Session->setFlash(__('Usuario o contraseña incorrecta, intente de nuevo'));
		}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	public function reasignacion() {
	if ($this->Session->read('Auth.User.role') === 'admin'){
		$fecha = date('Y-m-d');
		$this->set('usuario_registrado', $this->Auth->user());
		$this->set('usuarios', $this->Beca->find('all', array('conditions' => array('Beca.fecha <' => $fecha,'Beca.otorgada ='=>'0'))));
	}
	else $this->redirect(array('action' => 'index'));
	}
	
	
	public function perfil() {
		$this->set('usuario_registrado', $this->Auth->user());
	}
	
	public function password() {
	
	
		$this->set('usuario', $this->Auth->user());
		$usuario = $this->Auth->user();
		
		$user=$this->User->find('first',array('conditions' => array('username' => $usuario['username'])));
        
		
		
		 if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data;
			
			//Checa contraseña actual
			if ($user['User']['password'] ==AuthComponent::password($this->request->data['User']['password_vieja'])){
						
				//Checa si las contraseñas coinciden
				if ($this->request->data['User']['password_nueva'] == $this->request->data['User']['password']){
					if ($this->User->save($this->request->data)) {
						$this->Session->setFlash(__('La contraseña ha sido modificada'));
						return $this->redirect(array('controller' => 'users', 'action' => 'perfil'));
						
					}
					
				}
				else $this->Session->setFlash(__('Las contraseñas no coinciden'));
			}
			else $this->Session->setFlash(__('Contraseña incorrecta'));
		}
		
		
		
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
		
		else if ($usuario['role']=='encargado') {
		$this->set('admin', $this->Auth->user());
			return $this->redirect(array('controller' => 'encargados', 'action' => 'index'));
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
	
		if ($this->Session->read('Auth.User.role') === 'admin'){
		
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
	   else $this->redirect(array('action' => 'logout'));
    }
	
	public function agregar_encargado() {
	
		if ($this->Session->read('Auth.User.role') === 'admin'){
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('El encargado de cafeteria ha sido guardado'));
                return $this->redirect(array('controller' =>'admins','action' => 'index'));
            }
            $this->Session->setFlash(__('El encargado de cafeteria no pudo ser guardado. Por favor intente nuevamente'));
        }
		}
	   else $this->redirect(array('action' => 'logout'));
    }
	
	public function agregar_alumno() {
		
		if ($this->Session->read('Auth.User.role') === 'admin'){
		
		$this->set('carreras', $this->User->Carrera->find('list'));
		
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('El alumno ha sido guardado'));
                return $this->redirect(array('controller' =>'admins','action' => 'index'));
            }
            $this->Session->setFlash(__('El alumno no pudo ser guardado. Por favor intente nuevamente'));
        }
		}
	   else $this->redirect(array('action' => 'logout'));
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
	
	public function actualizar(){
		$usuarios=$this->User->find('all', array('conditions' => array('User.id <' => 15)));
		$this->set('usuarios', $usuarios);
		
		
		foreach($usuarios as $user){
			$string = AuthComponent::password($user['User']['username']);
			$this->User->updateAll(array('User.password' => '"'.$string.'"'), array('User.username' => $user['User']['username']));
		}
		
		
		foreach($usuarios as $user){
			$string = AuthComponent::password($user['User']['username']);
			$this->User->updateAll(array('User.role' => '"alumno"'), array('User.username' => $user['User']['username']));
		}
	}
	
	public function asignacion($id){
	$this->set('alumno', $this->User->find('first', array('conditions' => array('User.id =' => $id))));
	$this->set('periodo', $this->Periodo->find('first', array('conditions' => array('Periodo.activo =' => 1))));
	if ($this->request->is('post')) {
		$becas = $this->data['Asignacion']['Becas'];
		$this->User->updateAll(array('User.dias_disp' =>'User.dias_disp + '.$becas), array('User.id' => $id));
		$this->Periodo->updateAll(array('Periodo.becas_disponibles' =>'Periodo.becas_disponibles - '.$becas), array('Periodo.activo =' => 1));
		return $this->redirect(array('controller' =>'alumnos','action' => 'listado'));
		}
	}
	
	public function encuesta(){
	
	}
	
}
?>