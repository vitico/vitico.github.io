<!DOCTYPE html>
<html>
	<head prefix="og: http://ogp.me/ns#">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta property="og:url" content="http://q-interactiva.com/clientes/v2b/facebook/caja_recomendacion.php" /> 
		<meta property="og:site_name" content="[Q] interactiva" /> 
		<meta property="og:title" content="Plugin social: Caja de recomendación" /> 
		<meta property="og:description" content="Aprende cómo integrar Facebook en tu propia web." />
		<meta property="og:image" content="http://q-interactiva.com/clientes/v2b/facebook/img/img_fb.png" />

		<title>Integración con Facebook</title>
		<?php include 'headers.php'; ?>
	</head>
	<body>
		
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1&appId=1476352729172441";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

	   	<div class="container-fluid">			
			<div class="page-header">
				<h1>Integración de Facebook en tu web</h1>
			</div>
			<?php include 'menu.php'; ?>
			<blockquote>
				<p>Plugin social: Caja de recomendación</p>
				<small>Muestra el contenido más recomendado por los usuarios de Facebook en tu web.</small>
			</blockquote>

			<div class="fb-recommendations" data-app-id="Display all actions associated with this app ID" data-site="q-interactiva.com" data-action="likes, recommends" data-width="400" data-height="150" data-colorscheme="light" data-header="true"></div>

		</div>

		<?php include 'footer_scripts.php'; ?>
	</body>
</html>