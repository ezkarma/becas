<?php

class AlumnosController extends AppController {
    public function index() {
        //grab all ingredients and pass it to the view:
        $alumnos = $this->Alumno->find('all');
        $this->set('alumnos', $alumnos);
    }
}

?>