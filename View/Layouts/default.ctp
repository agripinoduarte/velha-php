<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		<?php echo __('Jogo da Velha'); ?>
		<?php
			echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<?php echo $this->Html->css('bootstrap.min'); ?>
	<style>
	body {
		padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
	}
	</style>
	<?php echo $this->Html->css('bootstrap-responsive.min'); ?>

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	<!--
	<link rel="shortcut icon" href="/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
	-->
	<?php
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->Html->css('datepicker');

	echo $this->Html->script('http://code.jquery.com/jquery-1.9.1.min.js');
	echo $this->Html->script('bootstrap-datepicker/bootstrap-datepicker');
	echo $this->Html->script('ui');


	?>
</head>

<body>
<?php if (isset($loggedUser)): ?>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="/board"><?php echo __('Jogo da Velha'); ?></a>
				<div class="nav-collapse">
					<ul class="nav">
						<li><a href="/board">Home</a></li>
						<li><a href="/board/game">Single Player</a></li>
						<li><a href="/users/logout">Encerrar Sessão</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
<?php endif; ?>
	<div class="container">
		<?php echo $this->Session->flash(); ?>
			<div class="content-fluid">
		<?php echo $this->fetch('content'); ?>
	</div>

	</div> <!-- /container -->

	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<?php
		echo $this->Html->script('bootstrap.min'); 
		echo $this->Html->script('gameinterface'); 
		echo $this->Html->css('game'); 
	?>
	<?php echo $this->fetch('script'); ?>

</body>
</html>
