
<center>
<div class="users form" style="width:40%;margin-right:30%;" >
<?php echo $this->Form->create('Encuesta'); ?>
    <fieldset>
        <legend><?php echo 'Encuesta'; ?></legend>
		
        <?php 
		
		echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$usuario_registrado['id']));
		
		echo $this->Form->input( 'pregunta1', array('label'=>'¿Es usted originario de Chilpancingo?','type' => 'select',
        'options' => array(1 => 'Si', 2 => 'No',),));
		
		echo $this->Form->input( 'pregunta2', array('label'=>'¿De quien depende economicamente?','type' => 'select',
        'options' => array(1 => 'Padres', 2 => 'Abuelos',3=>'De si mismo',4=>'Algun otro tutor',),));
		
		echo $this->Form->input( 'pregunta3', array('label'=>'¿Trabaja?','type' => 'select',
        'options' => array(1 => 'Si', 2 => 'No',),));
		
		echo $this->Form->input( 'pregunta4', array('label'=>'¿Tiene casa propia?','type' => 'select',
        'options' => array(1 => 'Si', 2 => 'No',),));
		
		echo $this->Form->input('pregunta5',array('type'=>'textbox','label'=>'¿Cuanto gasta en comida al dia?'));
		
		echo $this->Form->input( 'pregunta6', array('label'=>'¿Como calificaria la comida de la cafeteria?','type' => 'select',
        'options' => array(1 => 'Excelente', 2 => 'Buena',3=>'Regular',4=>'Mala'),));
		
		echo $this->Form->input('pregunta7',array('type'=>'textarea','label'=>'Por favor escriba el motivo por el cual desea obtener la beca'));
			
	
		
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
</center>