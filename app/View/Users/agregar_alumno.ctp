<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Agregar Alumno'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->hidden('role', array('default'=>'alumno'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>