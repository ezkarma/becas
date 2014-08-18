<?php

class EncuestasController extends AppController {

	var $uses = array('Encuesta','User','Alumno');

	public function ver($curp){
	$encuesta = $this->Encuesta->find('first',array('conditions' => array('alumno_matricula' => $curp)));
	$this->set('encuesta',$encuesta);
	}
	
	public function index(){
	$user = $this->Auth->user();
	$usuario = $this->Alumno->find('first',array('conditions' => array('matricula' => $user['username'])));
		
	if($usuario['Alumno']['encuesta'] == 0){
		
	$this->set('usuario_registrado', $usuario);
		
			if($this->request->is('post')){
			
			if ($this->Encuesta->save($this->request->data)) {
					
				//$usuario = $this->Auth->user();
				$this->Alumno->updateAll(array('encuesta' =>1), array('Alumno.matricula =' => $usuario['Alumno']['matricula']));
				$this->Session->write('Auth.User.encuesta', 1);
				
				$this->Session->setFlash('Se solicitud ha sido guardada exitosamente','success');
				$this->redirect(array('controller'=>'users','action'=>'index'));
				}
			
			}
		}
	else $this->redirect(array('controller'=>'users','action' => 'index'));
	}
	
	public function evaluar(){
		$encuestas = $this->Encuesta->find('all',array('order'=>'resultado DESC'));
						
		foreach ($encuestas as $encuesta){
		
		$resultado = 0;
		$pregunta1 = 0;
		$pregunta2 = 0;
		$pregunta3 = 0;
		$pregunta4 = 0;
		$pregunta5 = 0;
		$pregunta6 = 0;
		$pregunta7 = 0;
		
		switch($encuesta['Encuesta']['pregunta1']){
				case 1 : $pregunta1 = 0;break;
				case 2 : $pregunta1 = 10;break;
			}
		
		$resultado = $resultado +$pregunta1;
		
		switch($encuesta['Encuesta']['pregunta2']){
				case 1 : $pregunta2 = 5;break;
				case 2 : $pregunta2 = 7;break;
				case 3 : $pregunta2 = 10;break;
				case 4 : $pregunta2 = 8;break;
			}
		
		$resultado = $resultado +$pregunta2;
		
		switch($encuesta['Encuesta']['pregunta3']){
				case 1 : $pregunta3 = 10;break;
				case 2 : $pregunta3 = 0;break;
			}
		
		$resultado = $resultado +$pregunta3;
		
		if(($encuesta['Encuesta']['pregunta4']==1) && ($encuesta['Encuesta']['pregunta1']==1)){
				$pregunta4 = 0;
		}
		else $pregunta4 = 10;
		
		$resultado = $resultado +$pregunta4;
		
		if($encuesta['Encuesta']['pregunta5']>=250) $pregunta5 = 0;
		elseif($encuesta['Encuesta']['pregunta5']>=150 && $encuesta['Encuesta']['pregunta5']<250) $pregunta5 = 5;
		elseif($encuesta['Encuesta']['pregunta5']>0 && $encuesta['Encuesta']['pregunta5']<150) $pregunta5 = 10;
		elseif($encuesta['Encuesta']['pregunta5']==0) $pregunta5 = 0;
		
		$resultado = $resultado +$pregunta5;
		
		switch($encuesta['Encuesta']['pregunta6']){
				case 1 : $pregunta6 = 10;break;
				case 2 : $pregunta6 = 8;break;
				case 3 : $pregunta6 = 5;break;
				case 4 : $pregunta6 = 0;break;
			}
		
		$resultado = $resultado +$pregunta6;
				
		$this->Encuesta->updateAll(array('resultado' =>$resultado), array('Encuesta.alumno_matricula =' => $encuesta['Encuesta']['alumno_matricula']));
		}
		
		return $this->redirect(array('controller'=>'encuestas','action' => 'resultados'));
		
	}
	
	public function resultados(){
	if ($this->Session->read('Auth.User.role') === 'admin'){
			$this->set('usuarios',$this->Alumno->Encuesta->find('all',array('order' =>'Encuesta.resultado DESC')));
		
		if ($this->request->is('post')) {
			$matricula = $this->data['UserBusqueda']['username'];
			$this->set('usuarios', $this->Alumno->Encuesta->find('all', array('order' =>'Encuesta.resultado DESC','conditions' => array('User.role =' => 'alumno','User.username LIKE' => '%'.$matricula.'%'))));
		}
	
	}
	else $this->redirect(array('controller'=>'users','action' => 'index'));
	}
}

?>