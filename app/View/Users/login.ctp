<div class="container" style="width:30%">
    <div class="row">
        <div class="span3 centred">
            
<?php echo $this->Session->flash('auth'); ?>
<?php //echo $this->Form->create('User'); ?>

<?php echo $this->Form->create('User', array(
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'control-group'),
        'label' => array('class' => 'control-label'),
        'between' => '<div class="controls">',
        'after' => '</div>',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline'))
    ))); ?>
	
    <fieldset>
        <legend><?php echo __('Por favor introduzca su correo electronico y contraseña'); ?></legend>
        <?php echo $this->Form->input('username',array('label'=>'Correo Electronico','class'=>'form-control'));
		echo '<br>';
        echo $this->Form->input('password',array('label'=>'Contraseña', 'class'=>'form-control'));
    ?>
    </fieldset>
	<br>
<center><?php echo $this->Form->submit('Iniciar Sesion',array('class' => 'btn btn-success'));?><center>


        </div>
    </div>
</div>