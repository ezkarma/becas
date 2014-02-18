<div class="container" style="width:30%">
    <div class="row">
        <div class="span3 centred">
            
<?php echo $this->Session->flash('auth'); ?>
<?php //echo $this->Form->create('User'); ?>

	<h2>Cambiar Contraseña</h2>
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
				
				<?php 
				echo $this->Form->input('id',array('label'=>'Id','value'=>$usuario['id'],'class'=>'form-control'));
				echo $this->Form->input('password_vieja',array('label'=>'Actual','type'=>'password','class'=>'form-control'));
				echo '<hr></hr>';
				echo $this->Form->input('password_nueva',array('label'=>'Nueva', 'type'=>'password', 'class'=>'form-control'));
				echo $this->Form->input('password',array('label'=>'Vuelve a escribir la contraseña nueva', 'type'=>'password', 'class'=>'form-control'));
			?>
			</fieldset>
			<br>
		<center><?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-success'));?><center>


        </div>
    </div>
</div>