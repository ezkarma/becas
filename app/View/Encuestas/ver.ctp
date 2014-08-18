
<center>
<div class="users form" style="width:40%;margin-right:30%;" >
<?php echo $this->Form->create('Encuesta'); ?>
    <fieldset>
        <legend><?php echo 'Resultados de la Encuesta'; ?></legend>
		
		<font color=red>
        <?php 
		$resultado = 0;
		$pregunta1 = 0;
		$pregunta2 = 0;
		$pregunta3 = 0;
		$pregunta4 = 0;
		$pregunta5 = 0;
		$pregunta6 = 0;
		$pregunta7 = 0;
		//echo $this->Form->input('alumno_matricula',array('type'=>'hidden','value'=>$usuario_registrado['Alumno']['matricula']));
		echo $this->Form->input( 'pregunta1', array('label'=>'¿Es usted originario de Chilpancingo?','type' => 'select',
        'options' => array(1 => 'Si', 2 => 'No',),'value'=>$encuesta['Encuesta']['pregunta1'],'disabled'=>'disabled'));
		switch($encuesta['Encuesta']['pregunta1']){
				case 1 : $pregunta1 = 0;break;
				case 2 : $pregunta1 = 10;break;
			}
		$resultado = $resultado +$pregunta1;
		echo 'Puntos: '.$pregunta1;
		echo '<hr>';
		
		echo $this->Form->input( 'pregunta2', array('label'=>'¿De quien depende economicamente?','type' => 'select',
        'options' => array(1 => 'Padres', 2 => 'Abuelos',3=>'De si mismo',4=>'Algun otro tutor',),
		'value'=>$encuesta['Encuesta']['pregunta2'],'disabled'=>'disabled'));
		switch($encuesta['Encuesta']['pregunta2']){
				case 1 : $pregunta2 = 5;break;
				case 2 : $pregunta2 = 7;break;
				case 3 : $pregunta2 = 10;break;
				case 4 : $pregunta2 = 8;break;
			}
		$resultado = $resultado +$pregunta2;
		echo 'Puntos: '.$pregunta2;
		echo '<hr>';
		
		echo $this->Form->input( 'pregunta3', array('label'=>'¿Trabaja?','type' => 'select',
        'options' => array(1 => 'Si', 2 => 'No',),'value'=>$encuesta['Encuesta']['pregunta3'],'disabled'=>'disabled'));
		switch($encuesta['Encuesta']['pregunta3']){
				case 1 : $pregunta3 = 10;break;
				case 2 : $pregunta3 = 0;break;
			}
		
		$resultado = $resultado +$pregunta3;
		echo 'Puntos: '.$pregunta3;
		echo '<hr>';
		
		echo $this->Form->input( 'pregunta4', array('label'=>'¿Tiene casa propia?','type' => 'select',
        'options' => array(1 => 'Si', 2 => 'No',),'value'=>$encuesta['Encuesta']['pregunta4'],'disabled'=>'disabled'));
		if(($encuesta['Encuesta']['pregunta4']==1) && ($encuesta['Encuesta']['pregunta1']==1)){
				$pregunta4 = 0;
		}
		else $pregunta4 = 10;
		
		$resultado = $resultado +$pregunta4;
		echo 'Puntos: '.$pregunta4;
		echo '<hr>';
		
		echo $this->Form->input( 'pregunta5', array('label'=>'¿Cuanto gasta en su alimentación por semana en la UAI?','type' => 'select',
        'options' => array(0 => '0', 100 => '$1 a $150', 160 => '$151 a $250', 260 => 'Mas de $250',),
		'value'=>$encuesta['Encuesta']['pregunta5'],'disabled'=>'disabled'));
		if($encuesta['Encuesta']['pregunta5']>=250) $pregunta5 = 0;
		elseif($encuesta['Encuesta']['pregunta5']>=150 && $encuesta['Encuesta']['pregunta5']<250) $pregunta5 = 5;
		elseif($encuesta['Encuesta']['pregunta5']>0 && $encuesta['Encuesta']['pregunta5']<150) $pregunta5 = 10;
		elseif($encuesta['Encuesta']['pregunta5']==0) $pregunta5 = 0;
		
		$resultado = $resultado +$pregunta5;
		echo 'Puntos: '.$pregunta5;
		echo '<hr>';
		
		echo $this->Form->input( 'pregunta6', array('label'=>'¿Como calificaria la comida de la cafeteria?','type' => 'select',
        'options' => array(1 => 'Excelente', 2 => 'Buena',3=>'Regular',4=>'Mala'),
		'value'=>$encuesta['Encuesta']['pregunta6'],'disabled'=>'disabled'));
		switch($encuesta['Encuesta']['pregunta6']){
				case 1 : $pregunta6 = 10;break;
				case 2 : $pregunta6 = 8;break;
				case 3 : $pregunta6 = 5;break;
				case 4 : $pregunta6 = 0;break;
			}
		
		$resultado = $resultado +$pregunta6;
		echo 'Puntos: '.$pregunta6;
		echo '<hr>';
		
		echo $this->Form->input('pregunta7',array('type'=>'textarea','label'=>'Por favor escriba el motivo por el cual desea obtener la beca',
		'value'=>$encuesta['Encuesta']['pregunta7'],'disabled'=>'disabled'));
	?>
	<h2>Puntaje total: <?php echo $resultado ?></h2>
	</font>
    </fieldset>
	
</div>
</center>