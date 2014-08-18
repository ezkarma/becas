<div class="container" style="width:30%">
    <div class="row">
        <div class="span3 centred">
         
		 <h2>Mi Perfil</h2>
		 <br>
		 <table class='table'>
		<?php if($user['role'] != 'admin'){ ?>
		<tr><td><?php echo '<strong>Matricula:</strong> '.$usuario_registrado['Alumno']['matricula']; ?></td></tr>
		<tr><td><?php echo '<strong>Nombre:</strong> '.$usuario_registrado['Alumno']['nombre'].' '.$usuario_registrado['Alumno']['apellidop'].' '.$usuario_registrado['Alumno']['apellidom']; ?></td></tr>
		<tr><td><?php echo '<strong>Contraseña: </strong> '.$this->Html->link('Modificar',array('controller' => 'Users', 'action' => 'Password')); ?></td></tr>
		<?php } else echo '<tr><td><strong>Contraseña: </strong> '.$this->Html->link('Modificar',array('controller' => 'Users', 'action' => 'Password')).'</td></tr>'; ?>
		
		
		</table>	

	 </div>
    </div>
</div>