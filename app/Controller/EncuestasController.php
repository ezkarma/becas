<?php

class EncuestasController extends AppController {

	var $uses = array('Encuesta','User');

	public function index(){
	$usuario = $this->Auth->user();
	
	if($usuario['encuesta'] == 0){
	
	$this->set('usuario_registrado', $this->Auth->user());
		
			if($this->request->is('post')){
			
			if ($this->Encuesta->save($this->request->data)) {
					
				//$usuario = $this->Auth->user();
				$this->User->updateAll(array('encuesta' =>1), array('User.id =' => $usuario['id']));
				$this->Session->write('Auth.User.encuesta', 1);
				
				$this->Session->setFlash('Se solicitud ha sido guardada exitosamente','success');
				$this->redirect(array('controller'=>'users','action'=>'index'));
				}
			
			}
		}
	else $this->redirect(array('controller'=>'users','action' => 'index'));
	}
	
	public function evaluar(){
		$encuestas = $this->Encuesta->find('all');
						
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
				case 2 : $pregunta1 = 1;break;
			}
		
		$resultado = $resultado +$pregunta1;
		
		switch($encuesta['Encuesta']['pregunta2']){
				case 1 : $pregunta2 = 0.75;break;
				case 2 : $pregunta2 = 1;break;
				case 3 : $pregunta2 = 0.5;break;
				case 4 : $pregunta2 = 0.25;break;
			}
		
		$resultado = $resultado +$pregunta2;
		
		switch($encuesta['Encuesta']['pregunta3']){
				case 1 : $pregunta3 = 0;break;
				case 2 : $pregunta3 = 1;break;
			}
		
		$resultado = $resultado +$pregunta3;
		
		if(($encuesta['Encuesta']['pregunta4']==1) && ($encuesta['Encuesta']['pregunta1']==1)){
				$pregunta4 = 0;
		}
		else $pregunta4 = 1;
		
		$resultado = $resultado +$pregunta4;
		
		if($encuesta['Encuesta']['pregunta5']>=75) $pregunta5 = 0;
		elseif($encuesta['Encuesta']['pregunta5']>=50 && $encuesta['Encuesta']['pregunta5']<75) $pregunta5 = 0.25;
		elseif($encuesta['Encuesta']['pregunta5']>=25 && $encuesta['Encuesta']['pregunta5']<50) $pregunta5 = 0.5;
		elseif($encuesta['Encuesta']['pregunta5']>0 && $encuesta['Encuesta']['pregunta5']<25) $pregunta5 =1;
		elseif($encuesta['Encuesta']['pregunta5']==0) $pregunta5 = 0;
		
		$resultado = $resultado +$pregunta5;
		
		switch($encuesta['Encuesta']['pregunta6']){
				case 1 : $pregunta6 = 1;break;
				case 2 : $pregunta6 = 0.75;break;
				case 3 : $pregunta6 = 0.5;break;
				case 4 : $pregunta6 = 0;break;
			}
		
		$resultado = $resultado +$pregunta6;
				
		$this->Encuesta->updateAll(array('resultado' =>$resultado), array('Encuesta.user_id =' => $encuesta['Encuesta']['user_id']));
		}
		
		return $this->redirect(array('controller'=>'encuestas','action' => 'resultados'));
		
	}
	
	public function resultados(){
	if ($this->Session->read('Auth.User.role') === 'admin'){
			$this->set('usuarios',$this->User->Encuesta->find('all',array('order' =>'Encuesta.resultado DESC')));
		
		if ($this->request->is('post')) {
			$matricula = $this->data['UserBusqueda']['username'];
			$this->set('usuarios', $this->User->Encuesta->find('all', array('order' =>'Encuesta.resultado DESC','conditions' => array('User.role =' => 'alumno','User.username LIKE' => '%'.$matricula.'%'))));
		}
	
	}
	else $this->redirect(array('controller'=>'users','action' => 'index'));
	}
}

?>