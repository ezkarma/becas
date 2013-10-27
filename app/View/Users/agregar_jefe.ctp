<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Agregar Jefe de Grupo'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->hidden('role', array('default'=>'jefe'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>