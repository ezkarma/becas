<div class="row">
	<div class="col-lg-12">	        

<center><h2>Beneficiarios del Programa</h2></center>
<style type="text/css">
div.inline { float:left; }
.clearBoth { clear:both; }
</style>
<br>
<br>

<div style='width:60%;margin:0 auto'>
<legend>Los alumnos aceptados al programa de becas alimenticias seran
 aquellos que tengan los puntajes mas altos de la encuesta socio economica 
 que realizaron previamente.<br><br></legend>
 </div>

<div class="col-lg-3">
</div>
<div class="col-lg-3"><h3>Numero de Beneficiarios</h3></div>
<div class="col-lg-2">	
<?php
echo $this->Form->create('Beneficiarios', array(
   'inputDefaults' => array(
        'label' => false,
        'div' => false
    )
));
echo '<br>';
echo $this->Form->input('numero',array('type' => 'textbox','class'=>'form-control'));
?>
</div>

<div class="col-lg-2">	
<?php
echo '<br>';
echo $this->Form->end('Asignar'); 
?>
</div>
</div>
</div>
</div>

	
	