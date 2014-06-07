<div class="row">
	<div class="col-lg-2">	
	</div>
		<div class="col-lg-10">	        

<h2>Beneficiarios del Programa</h2>
<style type="text/css">
div.inline { float:left; }
.clearBoth { clear:both; }
</style>

<div class="col-lg-4"><h3>Numero de Beneficiarios</h3></div>
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
	
	