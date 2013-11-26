<!-- app/View/Users/add.ctp -->

<h2>Sistema de Gestion de Becas Alimenticias de la UAI</h2>

<h3>Bienvenido</h3>
<?php
echo $usuario_registrado['username'];

echo $this->Html->link("Ingresar", array('controller' =>'users','action'=> 'login'));
echo '<br>';

echo '<center>'.$this->Html->image('baner.gif').'</center>';
?>

