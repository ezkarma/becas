<?php
class EncargadosController extends AppController {
    	
	var $uses = array('Alumno','Beca','Carrera','Fecha','Periodo','CafeteriaEncargado','Cafeteria');

    public function index() {
		
		if ($this->Session->read('Auth.User.role') === 'encargado'){
		date_default_timezone_set('America/Mexico_City');
		 
		$fecha = date('Y-m-d');
		$datemonth = date('d');
		$dia = date('D');
		$mes = date('m');
		
		switch ($dia){
		case 'Mon' : $dia = 'Lunes';break;
		case 'Tue' : $dia = 'Martes';break;
		case 'Wed' : $dia = 'Miercoles';break;
		case 'Thu' : $dia = 'Jueves';break;
		case 'Fri' : $dia = 'Viernes';break;
		case 'Sat' : $dia = 'Sabado';break;
		case 'Sun' : $dia = 'Domingo';break;
		}
		
		switch ($mes){
		case '01' : $mes = '';break;
		case '02' : $mes = '';break;
		case '03' : $mes = '';break;
		case '04' : $mes = '';break;
		case '05' : $mes = '';break;
		case '06' : $mes = '';break;
		case '07' : $mes = '';break;
		case '08' : $mes = 'Agosto';break;
		case '09' : $mes = '';break;
		case '10' : $mes = '';break;
		case '11' : $mes = '';break;
		case '12' : $mes = '';break;
	
		}
		
		$this->set('fecha',$fecha);
		$this->set('dia',$dia);
		$this->set('datemonth',$datemonth);
		$this->set('mes',$mes);
		
		$usuario_registrado = $this->Auth->user();
		$encargado = $this->Cafeteria->CafeteriaEncargado->find('first',array('conditions'=>array('CafeteriaEncargado.correo'=>$usuario_registrado['username'])));
        		
		$this->set('usuario_registrado', $usuario_registrado);
		$this->set('encargado', $encargado);
		
		$this->set('alumnos', $this->Alumno->Beca->find('all', array('conditions' => array('Beca.fecha =' => $fecha))));
		$this->set('carreras',$this->Carrera->find('all'));
		
		
			if ($this->request->is('post')) {
				$matricula = $this->data['UserBusqueda']['username'];
				$this->set('alumnos', $this->User->Beca->find('all', array('conditions' => array('Beca.fecha =' => $fecha,'User.username LIKE' => '%'.$matricula.'%'))));
			}
			
			
				}
		else 
		$this->redirect(array('action' => 'logout'));
		

    }

   public function logout() {
    return $this->redirect($this->Auth->logout());
	}
	
	public function estadisticas(){
		$this->set('becas',$this->Periodo->Fecha->find('all',array('conditions' => array('Fecha.habil =' => true))));
	}
}

?>