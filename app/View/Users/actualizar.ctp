Actualizar Registros

<table class="table table-striped table-hover table-bordered">
<th>Matricula</th>
<th>Contraseña</th>
<?php 

foreach($usuarios as $user){
echo '<tr>';
echo '<td>'.$user['User']['username'].'</td>';
echo '<td>'.AuthComponent::password($user['User']['username']).'</td>';
echo '</tr>';
}
?>

</table>