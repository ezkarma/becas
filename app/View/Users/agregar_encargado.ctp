<div class="users form" style="width:30%;margin-right:30%;" >
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Agregar Encargado de la Cafeteria'); ?></legend>
        <?php 
		echo $this->Form->input('nombre');
		echo $this->Form->input('apellidop', array('label' => 'Apellido Paterno'));
		echo $this->Form->input('apellidom', array('label' => 'Apellido Materno'));
		echo $this->Form->input('telefono', array('label' => 'Numero Telefonico'));
		echo $this->Form->input('username');
        echo $this->Form->input('password');
	    echo $this->Form->hidden('role', array('default'=>'encargado'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>