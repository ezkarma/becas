<div class="users form" style="width:30%;margin-right:30%;" >
<h2>Otorgar Beca</h2>

<?php // echo $clave['Beca']['clave']?>
<h3><?php echo $usuario?> introduzca el codigo de confirmacion para recibir su beca del dia <?php echo $fecha?></h3>
<?php echo $this->Form->create('Beca', array(
    'inputDefaults' => array(
        'label' => false
    )
));

echo $this->Form->input('clave',array('label'=>'Codigo','type'=>'textbox'));

echo $this->Form->end(__('Canjear')); 
?>
</div>