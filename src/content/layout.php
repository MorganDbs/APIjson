<!DOCTYPE html>
<html>
<head>
	<title>Interopérabilité</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../src/public/assets/materialize/css/materialize.min.css">
	<script src="../src/public/assets/jquery/jquery-3.3.1.min.js"></script> 
	<script src="../src/public/assets/materialize/js/materialize.min.js"></script> 
</head>
<body>


	<nav>
		<div class="nav-wrapper blue">
			<a href="#" class="brand-logo center">Interopérabilité</a>
			<ul id="nav-mobile" class="left hide-on-med-and-down">
				<li><a href="home">Accueil</a></li>
				<li><a href="meteo">Météo</a></li>
				<li><a href="velostan">Vélostan</a></li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<?php echo $content_for_layout; ?>
	</div>

</body>
</html>