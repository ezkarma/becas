<div class="container" style="width:30%">
    <div class="row">
        <div class="span3 centred">
         
		 <h2>Mi Perfil</h2>
		 <br>
		 <table class='table'>
		<tr><td><?php echo '<strong>Matricula:</strong> '.$usuario_registrado['username']; ?></td></tr>
		<tr><td><?php echo '<strong>Nombre:</strong> '.$usuario_registrado['nombre'].' '.$usuario_registrado['apellidop'].' '.$usuario_registrado['apellidom']; ?></td></tr>
		<tr><td><?php echo '<strong>Contraseña: </strong> '.$this->Html->link('Modificar',array('controller' => 'Users', 'action' => 'Password')); ?></td></tr>
		</table>	

	 </div>
    </div>
</div>