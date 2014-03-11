<?php
App::uses('User', 'Fecha','Periodo');

class BecasController extends AppController {

var $uses = array('Fecha','User','Beca','Session','Periodo');
    
    public function listado() {
        $this->set('usuario_registrado', $this->Auth->user());
		$this->set('becas', $this->Fecha->find('all', array('conditions' => array('Fecha.fecha !=' => '0000-00-00'))));
    }
	
	 public function calendario() {
		if ($this->Session->read('Auth.User.dias_disp') > 0){
        $this->set('usuario_registrado', $this->Auth->user());
		$this->set('becas', $this->Fecha->find('all', array('conditions' => array('Fecha.fecha !=' => '0000-00-00'))));
		}
		else $this->redirect(array('controller'=>'users','action' => 'index'));
	}
	
	public function solicitar($fecha) {
	  
		$usuario = $this->Auth->user();
	  
        $this->set('usuario_registrado', $this->Auth->user());
		$this->set('fecha',$fecha);
		
		//Save Beca
		if($this->request->is('post')){
		if ($this->Beca->save($this->request->data)) {
						
				$this->User->updateAll(array('User.dias_disp' =>'User.dias_disp - 1'), array('User.username' => $usuario['username']));
				
				$dias = $usuario['dias_disp'] - 1;
				$this->Session->write('Auth.User.dias_disp', $dias);
						
				
				$this->Fecha->updateAll(array('Fecha.becas' =>'Fecha.becas - 1'), array('Fecha.fecha' => $fecha));
		
				$this->Session->setFlash('Su solicitud ha sido aceptada exitosamente');
				$this->redirect(array('controller'=>'alumnos','action'=>'index'));
				
				
			}
		}		
    }
	
	public function otorgar($usuario) {
	
			$this->set('usuario',$usuario);
			
			$fecha = date('Y-m-d');
			
			$clave = $this->Beca->find('first', array('conditions' => array('Beca.fecha =' => $fecha,'Beca.user_id' => $usuario)));
			
			$this->set('clave', $clave);
			$this->set('fecha', $fecha);
			
			if($this->request->is('post')){
						
			if ($clave['Beca']['clave']==$this->data['Beca']['clave']){
				$this->Beca->updateAll(array('Beca.otorgada' =>true), array('Beca.clave' => $clave['Beca']['clave'],'Beca.user_id' => $usuario,'Beca.fecha' => $fecha));
				$this->Session->setFlash('Su codigo ha sido registrado exitosamente');
				$this->redirect(array('controller'=>'encargados','action'=>'index'));
			}
			else {
				$this->Session->setFlash('Codigo no valido');
			}
			}
	}
	
	public function reasignar_beca($idusuario,$idbeca){
		$this->User->updateAll(array('User.dias_disp' =>'User.dias_disp + 1'), array('User.username' => $idusuario));
		$this->Beca->delete($idbeca);
		$this->Session->setFlash('La beca ha sido reasignada exitosamente');
		$this->redirect(array('controller'=>'users','action'=>'reasignacion'));
	
	}
	
	public function eliminar_beca($idbeca){
		$this->Periodo->updateAll(array('Periodo.becas_disponibles' =>'Periodo.becas_disponibles + 1' ),array('Periodo.activo' =>true));
		//$this->User->updateAll(array('User.dias_disp' =>'User.dias_disp + 1'), array('User.username' => $idusuario));
		$this->Beca->delete($idbeca);
		$this->Session->setFlash('La beca ha sido eliminada exitosamente');
		$this->redirect(array('controller'=>'users','action'=>'reasignacion'));
	}
	
	public function verificar($fecha){
		$usuario = $this->Auth->user();
				
		$existe = $this->Beca->find('first', array('conditions' => array('Beca.fecha =' => $fecha,'Beca.user_id' => $usuario['id'])));
		
		if(!$existe){	
			$this->redirect(array('controller'=>'becas','action'=>'solicitar/'.$fecha));
		}
		else{
			$this->Session->setFlash('Usted ya ha solicitado una beca para este dia');
			$this->redirect(array('controller'=>'becas','action'=>'calendario'));
		}
	}
}

?>