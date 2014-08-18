<!-- app/View/Users/add.ctp -->
<div class="row">
	<div class="col-lg-4">	
	</div>
		<div class="col-lg-4">
<center>
<h2>Solicitar Beca</h2>

<legend>
<?php echo $alumno['Alumno']['nombre']; ?> estas segur@ 
que deseas solicitar una beca para el dia <?php echo $fecha ?>
</legend>

<?php
	$characters = '0123456789';
	$randomString = '';
    for ($i = 0; $i < 4; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
?>
	
  <!---h3> Codigo para canjear Beca: <b><?php echo $randomString?> </b></h3--->

<?php echo $this->Form->create('Beca', array(
    'inputDefaults' => array(
        'label' => false
    )
));

echo $this->Form->submit('Solicitar'); 
echo $this->Form->input('id');
echo $this->Form->input('alumno_matricula', array('type'=>'textbox','value' =>  $alumno['Alumno']['matricula'],'hidden'=>'true'));
echo $this->Form->input('fecha', array('type'=>'textbox', 'value'=>$fecha,'hidden'=>'true'));
echo $this->Form->input('cafeteria_id', array('type'=>'textbox', 'value'=>$cafeteria,'hidden'=>'true'));
echo $this->Form->input('clave',array('value'=>$randomString,'hidden'=>'true','type'=>'textbox'));
echo $this->Form->end(); 

?>
</center>
</div>
</div>
</div>

