<!-- app/View/Users/add.ctp -->
<div class="row">
	<div class="col-lg-4">	
	</div>
		<div class="col-lg-4">
<center>
<h2>Seleccione una Cafeteria</h2>
<br>
<?php 
foreach ($cafeterias as $cafeteria){
	echo '<br>';
	
	if ($cafeteria['Cafeteria']['becas_otorgar'] > $becas[$cafeteria['Cafeteria']['id']]){
	$icono = $this->Html->tag('span', ' ', array('class'=>'glyphicon glyphicon-home'));
	echo '<center>'.$this->Html->link($icono.' '.$cafeteria['Cafeteria']['nombre'], array('controller' =>'becas','action'=> 'solicitar/'.$fecha.'/'.$cafeteria['Cafeteria']['id']),array('class'=>'btn btn-primary btn-lg','escape'=>false)).'<center>';
	}
	
	else{
	$icono = $this->Html->tag('span', ' ', array('class'=>'glyphicon glyphicon-home'));
	echo '<center>'.$this->Html->link($icono.' '.$cafeteria['Cafeteria']['nombre'], array('controller' =>'becas','action'=> 'solicitar/'.$fecha.'/'.$cafeteria['Cafeteria']['id']),array('class'=>'btn btn-primary btn-lg','escape'=>false,'disabled'=>'disabled')).'<center>';
	}
}
?>
</center>
</div>
</div>


