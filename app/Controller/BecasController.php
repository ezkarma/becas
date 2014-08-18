<?php
App::uses('User', 'Fecha','Periodo');

class BecasController extends AppController {

var $uses = array('Fecha','User','Beca','Session','Periodo','Encuesta','Alumno','Cafeteria');

	public function index(){
	
	}
    
    public function listado() {
        $this->set('usuario_registrado', $this->Auth->user());
		$this->set('becas', $this->Fecha->find('all', array('conditions' => array('Fecha.fecha !=' => '0000-00-00'))));
    }
	
	 public function calendario() {
		$user = $this->Auth->user();
		$usuario = $this->Alumno->find('first',array('conditions' => array('matricula' => $user['username'])));
		
		if ($usuario['Alumno']['dias_disp'] > 0){
        $this->set('usuario_registrado', $this->Auth->user());
		$this->set('becas', $this->Fecha->find('all', array('conditions' => array('Fecha.fecha !=' => '0000-00-00'))));
		}
		else $this->redirect(array('controller'=>'users','action' => 'index'));
	}
	
	public function cafeterias($fecha){
		$cafeterias = $this->Cafeteria->find('all');
				
		foreach($cafeterias as $cafeteria){
		$becas[$cafeteria['Cafeteria']['id']] = $this->Beca->find('count',array('conditions'=>array('Beca.fecha' =>$fecha,'Beca.cafeteria_id'=>$cafeteria['Cafeteria']['id'])));
		}
		
		$this->set('cafeterias',$cafeterias);
		$this->set('becas',$becas);
		$this->set('fecha',$fecha);
	}
	
	public function solicitar($fecha,$cafeteria) {
	  		
		$user = $this->Auth->user();
		$alumno = $this->Alumno->find('first',array('conditions' => array('matricula' => $user['username'])));
		
		if ($alumno['Alumno']['dias_disp'] > 0){
		
		$this->set('alumno', $alumno);
		$this->set('fecha',$fecha);
		$this->set('cafeteria',$cafeteria);
		
		//Save Beca
		if($this->request->is('post')){
					
		$existe = $this->Beca->find('first', array('conditions' => array('Beca.fecha =' => $fecha,'Beca.alumno_matricula' => $user['username'])));
		
		if(!$existe){	
			if ($this->Beca->save($this->request->data)) {
						
						$this->Alumno->updateAll(array('Alumno.dias_disp' =>'Alumno.dias_disp - 1'), array('Alumno.matricula' => $alumno['Alumno']['matricula']));
						$this->Fecha->updateAll(array('Fecha.becas' =>'Fecha.becas - 1'), array('Fecha.fecha' => $fecha));
				
						$this->Session->setFlash('Su solicitud ha sido aceptada exitosamente','success');
						$this->redirect(array('controller'=>'alumnos','action'=>'index'));		
			}
		}
		else{
			$this->Session->setFlash('Usted ya ha solicitado una beca para este dia');
			$this->redirect(array('controller'=>'alumnos','action'=>'index'));
		}
		
				
		}
		}
		else $this->redirect(array('controller'=>'users','action' => 'index'));
    }
	
	public function otorgar($usuario) {
	
			$this->set('usuario',$usuario);
			
			date_default_timezone_set('America/Mexico_City');
			
			$fecha = date('Y-m-d');
			
			$clave = $this->Beca->find('first', array('conditions' => array('Beca.fecha =' => $fecha,'Beca.alumno_matricula' => $usuario)));
			
			$this->set('clave', $clave);
			$this->set('fecha', $fecha);
			
			if($this->request->is('post')){
						
			if ($clave['Beca']['clave']==$this->data['Beca']['clave']){
				$this->Beca->updateAll(array('Beca.otorgada' =>true), array('Beca.clave' => $clave['Beca']['clave'],'Beca.alumno_matricula' => $usuario,'Beca.fecha' => $fecha));
				$this->Session->setFlash('Su codigo ha sido registrado exitosamente','success');
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
					
		$existe = $this->Beca->find('first', array('conditions' => array('Beca.fecha =' => $fecha,'Beca.alumno_matricula' => $usuario['username'])));
		
		if(!$existe){	
			$this->redirect(array('controller'=>'becas','action'=>'cafeterias/'.$fecha));
		}
		else{
			$this->Session->setFlash('Usted ya ha solicitado una beca para este dia');
			$this->redirect(array('controller'=>'becas','action'=>'calendario'));
		}
	}
	
	public function beneficiarios(){
	$encuestas = $this->Encuesta->find('all',array('order'=>'resultado DESC'));
	$con = 0;
	
		if($this->request->is('post')){
			$beneficiarios = $this->request->data['Beneficiarios']['numero']; 
			//echo $beneficiarios.'<br>';
			foreach($encuestas as $encuesta){
				//echo $encuesta['Encuesta']['user_id'].'<br>';
				
				if($con<$beneficiarios){
				$this->Alumno->updateAll(array('alumno.aceptado' =>true), array('Alumno.matricula' => $encuesta['Encuesta']['alumno_matricula']));
				}
				//echo $con;
				$con++;
			}
			$this->Session->setFlash('Los alumnos han sido aceptados al programa de becas alimenticias','success');
			$this->redirect(array('controller'=>'encuestas','action'=>'resultados'));
		}
	}
	
}

?>