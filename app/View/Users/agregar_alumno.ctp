<center>
<div class="users form" style="width:30%;margin-right:30%;" >
<?php echo $this->Form->create('Alumno'); ?>
    <fieldset>
        <legend><?php echo __('Agregar Alumno'); ?></legend>
		
        <?php 
		echo $this->Form->input('matricula',array('type'=>'textbox'));
		echo $this->Form->input('nombre');
		echo $this->Form->input('apellidop', array('label' => 'Apellido Paterno'));
		echo $this->Form->input('apellidom', array('label' => 'Apellido Materno'));
		echo $this->Form->input('carrera_id');
		echo $this->Form->input('semestre',array('type' => 'select',
        'options' => array(1 => 1, 2 => 2 , 3 => 3 , 4 => 4 , 5 => 5 , 6 => 6
		, 7 => 7 , 8 => 8 , 9 => 9, 10 => 10)));
	    echo $this->Form->hidden('role', array('default'=>'alumno'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
</center>