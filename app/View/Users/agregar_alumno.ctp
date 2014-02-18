<center>
<div class="users form" style="width:30%;margin-right:30%;" >
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Agregar Alumno'); ?></legend>
		
        <?php 
		echo $this->Form->input('matricula',array('type'=>'textbox'));
		echo $this->Form->input('nombre');
		echo $this->Form->input('apellidop', array('label' => 'Apellido Paterno'));
		echo $this->Form->input('apellidom', array('label' => 'Apellido Materno'));
		echo $this->Form->input('generacion_id');
		echo $this->Form->input('username',array('label' => 'Correo Electronico'));
        echo $this->Form->input('password');
	    echo $this->Form->hidden('role', array('default'=>'alumno'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
</center>