<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Becas Alimenticias');
?>
<!DOCTYPE html>
<html>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>

<style type="text/css">

      /* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #f5f5f5;
      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }

      /* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */

      .container {
        width: auto;
        max-width: 680px;
      }
      .container .credit {
        margin: 20px 0;
      }

    </style>

<head>

	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		
		echo $this->Html->css('bootstrap');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

			
	?>
	
	<nav class="navbar-inverse" role="navigation">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="/">Becas Alimenticias UAI </a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav">
					  						
						<?php

								$user = $this->Session->read('Auth.User.role'); 

								if ($this->Session->read('Auth.User')){
								
								if($user == 'admin'){
							echo 		'<li class="tutorials"><a href="/users/perfil">Mi perfil</a>  </li>'.
												
													// <li class="dropdown">
													// <a href="#" class="dropdown-toggle" data-toggle="dropdown">Agregar <b class="caret"></b></a>
													// <ul class="dropdown-menu">
														// <li><a href="/carreras/agregar">Carrera</a></li>
														// <li class="divider"></li>
														// <li><a href="../users/agregar_encargado">Encargado de Cafeteria</a></li>
														// <li><a href="../users/agregar_alumno">Alumno</a></li>
														// </ul>
													// </li>
												'<li class="tutorials"><a href="/alumnos/listado">Alumnos</a>  </li>
												<li class="tutorials"><a href="/becas">Becas</a>  </li>
												<li class="tutorials"><a href="/encuestas/evaluar">Encuestas</a>  </li>
												<li class="tutorials"><a href="/carreras">Carreras</a>  </li>
												<li class="tutorials"><a href="/cafeterias">Cafeterias</a>  </li>
												
												</ul>
												<ul class="nav navbar-nav navbar-right">
												<li><a href="/users/logout">Salir</a></li>
												
												</ul>';
								}
								else if($user == 'alumno'){
								echo 		'<li class="tutorials"><a href="/users/perfil">Mi perfil</a>  </li>';
								if ($this->Session->read('Auth.User.dias_disp')) echo	'<li class="tutorials"><a href="../../becas/calendario">Solicitar Dia</a>  </li>';
								echo			'</ul>
												<ul class="nav navbar-nav navbar-right">
												<li><a href="/users/logout">Salir</a></li>
												</ul>';

								}
								else if($user == 'encargado'){
								echo 		'<li class="tutorials"><a href="/users/perfil">Mi perfil</a>  </li>';
								echo 		'<li class="tutorials"><a href="/encargados/estadisticas">Estadisticas</a>  </li>';
								echo			'</ul>
												<ul class="nav navbar-nav navbar-right">
												<li><a href="/users/logout">Salir</a></li>
												</ul>';

								}
								}
								else{
								echo '</ul>
									<ul class="nav navbar-nav navbar-right">
											<li><a href="/users/login"><font color="white">Iniciar Sesion</font></a></li>
										</ul>';
								}
								?>
						</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
			
		</div>
	</head>
	
	<body>
	 <div id="wrap" height="100%">
	<div id="container">
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
			</div>
			
		</div>
		
		<div id="footer">
		<br>
			<center><small><strong>Unidad Academica de Ingeniería 2014</strong></small></center>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
     


