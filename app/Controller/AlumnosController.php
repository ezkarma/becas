<?php

class AlumnosController extends AppController {

var $uses = array('Alumno','User','Beca','Carrera','AlumnoTemporal','Cafeteria');

    public function index() {
		
		if ($this->Session->read('Auth.User.role') === 'alumno'){
		$user = $this->Auth->user();
		$usuario = $this->Alumno->find('first',array('conditions' => array('matricula' => $user['username'])));
				
			if($usuario['Alumno']['contrasena']==0){
				$this->redirect(array('controller' => 'users','action'=>'password'));
				}
			else {
			
				$user = $this->Auth->user();
				$usuario = $this->Alumno->find('first',array('conditions' => array('matricula' => $user['username'])));
		
				$this->set('usuario_registrado', $usuario);
				$this->set('becas', $this->Cafeteria->Beca->find('all', array('order'=>'Beca.fecha','conditions' => array('Beca.alumno_matricula =' => $usuario['Alumno']['matricula']))));
				}
		}
		
		else $this->redirect(array('action' => 'logout'));
	}
	
    
	
	public function logout() {
    return $this->redirect($this->Auth->logout());
	}
	
	public function listado() {
	if ($this->Session->read('Auth.User.role') === 'admin'){
		$this->set('usuario_registrado', $this->Auth->user());
		$this->set('usuarios', $this->Alumno->find('all'));
		
		if ($this->request->is('post')) {
			$matricula = $this->data['UserBusqueda']['username'];
			$this->set('usuarios', $this->Alumno->find('all', array('conditions' => array('Alumno.matricula LIKE' => '%'.$matricula.'%'))));
		}
	}
	else $this->redirect(array('action' => 'index'));
	}
	
	public function aceptados() {
	if ($this->Session->read('Auth.User.role') === 'admin'){
		$this->set('usuario_registrado', $this->Auth->user());
		$this->set('usuarios', $this->Alumno->find('all',array('conditions'=>array('Alumno.aceptado'=>true))));
		
		if ($this->request->is('post')) {
			$matricula = $this->data['UserBusqueda']['username'];
			$this->set('usuarios', $this->Alumno->find('all', array('conditions' => array('Alumno.matricula LIKE' => '%'.$matricula.'%','Alumno.aceptado'=>true))));
		}
	}
	else $this->redirect(array('action' => 'index'));
	}
	
	public function importar(){
	$this->AlumnoTemporal->query('TRUNCATE alumno_temporals;');
			if ($this->request->is('post') || $this->request->is('put')) {
					$file = $this->request->data['Document']['submittedfile'];
					move_uploaded_file($this->data['Document']['submittedfile']['tmp_name'],     $_SERVER['DOCUMENT_ROOT'] . '/app/webroot/files/archivo.csv');
					
					$messages = $this->AlumnoTemporal->import('archivo.csv');
					$this->redirect(array('action' => 'alumnostemporales'));					
			}
	}
	
	public function alumnostemporales(){
		$alumnos = $this->AlumnoTemporal->find('all');	
		$this->set('alumnos',$alumnos);
	}
	
	public function actualizar(){
		$alumnos = $this->AlumnoTemporal->find('all');
		
		foreach ($alumnos as $alumno){
			$this->Alumno->create();
			$this->request->data['Alumno']['matricula'] = $alumno['AlumnoTemporal']['matricula'];
			$this->request->data['Alumno']['nombre'] = $alumno['AlumnoTemporal']['nombre'];
			// $this->request->data['Alumno']['apellidop'] = $alumno['AlumnoTemporal']['apellidop'];
			// $this->request->data['Alumno']['apellidom'] = $alumno['AlumnoTemporal']['apellidom'];
			$this->request->data['Alumno']['semestre'] = $alumno['AlumnoTemporal']['semestre'];
			// $this->request->data['Alumno']['promedio'] = $alumno['AlumnoTemporal']['promedio'];
			$this->request->data['Alumno']['carrera_id'] = $alumno['AlumnoTemporal']['carrera'];
			$this->Alumno->save($this->request->data);		
			
			$this->User->create();
			$this->request->data['User']['username'] = $alumno['AlumnoTemporal']['matricula'];
			$this->request->data['User']['password'] = $alumno['AlumnoTemporal']['matricula'];
			$this->request->data['User']['role'] = 'alumno';
			$this->User->save($this->request->data);	
		}
		$this->Session->setFlash('La lista de alumnos ha sido actualizada','success');
		$this->redirect(array('action' => 'listado'));
	}

}

?>