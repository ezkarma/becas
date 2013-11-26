<div class="users form" style="width:30%;margin-right:30%;" >
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Por favor introduzca su correo electronico y contraseña'); ?></legend>
        <?php echo $this->Form->input('username',array('label'=>'Correo Electronico'));
        echo $this->Form->input('password',array('label'=>'Contraseña'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Ingresar')); ?>
</div>