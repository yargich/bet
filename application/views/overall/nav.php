
<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button id="menu-toggle" type="button" class="navbar-toggle" data-target="#navigation-doc">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar bar1"></span>
				<span class="icon-bar bar2"></span>
				<span class="icon-bar bar3"></span>
			</button>
				<!--<a href="">
					<div class="logo-container">
						<div class="logo">
							 <img src="assets/img/logo.png" alt="Creative Tim Logo"> 
						</div>
						<div class="brand">
							Creative Tim
						</div>
					</div>
				</a>-->
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navigation-doc">
				<ul class="nav navbar-nav">
					<li class="dropdown ">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"> PAISES <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?= base_url(); ?>paises">Listar</a></li>
							<li class="divider"></li>
							<li><a href="<?= base_url(); ?>paises/agregar#form">Agregar</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav">
					<li class="dropdown ">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"> TORNEOS <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?= base_url(); ?>competiciones">Listar</a></li>
							<li class="divider"></li>
							<li><a href="<?= base_url(); ?>competiciones/agregar">Agregar</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav">
					<li class="dropdown ">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"> EQUIPOS <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?= base_url(); ?>equipos">Listar</a></li>
							<li class="divider"></li>
							<li><a href="<?= base_url(); ?>equipos/agregar">Agregar</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav">
					<li class="dropdown ">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"> PARTIDOS <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?= base_url(); ?>partidos">Listar</a></li>
							<li class="divider"></li>
							<li><a href="<?= base_url(); ?>partidos/agregar">Agregar</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav">
					<li><a href="<?= base_url(); ?>sync">Sync</a></li> 
				</ul>
				<ul class="nav navbar-nav">
					<li><a href="<?= base_url(); ?>widget">Widget</a></li> 
				</ul>
				<ul  class="nav navbar-nav navbar-right">
					<ul class="nav navbar-nav">
						<li><a href="<?= base_url(); ?>home/deudas">Mis Apuestas</a></li> 
					</ul>
					<ul class="nav navbar-nav">
						<li><a href="<?= base_url(); ?>home/deudas"> <b>MI SALDO: </b>$ 3000,00</a></li> 
					</ul>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><b><?php echo ucwords($this->session->userdata('name')); ?></b> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Retirar</a></li>
							<li class="divider"></li>
							<li><a href="#">Mi Perfil</a></li>
							<li class="divider"></li>
							<li><a href="<?= base_url(); ?>login/logout">Salir</a></li>
						</ul>
					</li>

				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		<div class="wrapper">
			<div class="header header-filter" style="background-image: url('<?= base_url(); ?>public/img/header.jpg');">
			<!--<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="title text-center">Components Documentation</h1>
					</div>
				</div> 
			</div>-->
		</div>