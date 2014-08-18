<div class="col-lg-12">
<center>
<h3>Becas Alimenticias</h3>
</center>
</div>

<br>

<div class="col-lg-2">	
</div>

<div class="col-lg-4">	
<?php
$icono = $this->Html->tag('span', ' ', array('class'=>'glyphicon glyphicon-calendar'));
echo '<br><center>'.$this->Html->link($icono." Generar Nuevo Periodo de Becas", array('controller' =>'periodos','action'=> 'agregar'),array('class'=>'btn btn-primary btn-lg','escape'=>false)).'</center>';
?>
</div>

<div class="col-lg-4">	
<?php
$icono = $this->Html->tag('span', ' ', array('class'=>'glyphicon glyphicon-refresh'));
echo '<br><center>'.$this->Html->link($icono." Reasignacion de Becas", array('controller' =>'users','action'=> 'reasignacion'),array('class'=>'btn btn-primary btn-lg','escape'=>false)).'</center>';
?>
</div>
