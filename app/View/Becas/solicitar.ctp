<!-- app/View/Users/add.ctp -->
<h2>Solicitar Beca</h2>

<h3>
<?php
echo $usuario_registrado['nombre'];
?>

estas seguro que deseas solicitar una beca para el dia <?php echo $fecha ?>
</h3>

<?php
	$characters = '0123456789';
	$randomString = '';
    for ($i = 0; $i < 4; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
?>
	
<h3> Codigo para canjear Beca: <b><?php echo $randomString?> </b></h3>

<?php echo $this->Form->create('Beca', array(
    'inputDefaults' => array(
        'label' => false
    )
));

echo $this->Form->input('id');
echo $this->Form->input('user_id', array('type'=>'textbox','value' =>  $usuario_registrado['id'],'hidden'=>'true'));
echo $this->Form->input('fecha', array('type'=>'textbox', 'value'=>$fecha,'hidden'=>'true'));
echo $this->Form->input('clave',array('value'=>$randomString,'hidden'=>'true','type'=>'textbox'));


echo $this->Form->end(__('Solicitar')); 

?>

