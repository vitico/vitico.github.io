<!DOCTYPE html>
<html>
	<head prefix="og: http://ogp.me/ns#">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta property="og:url" content="http://q-interactiva.com/clientes/v2b/facebook/feed_actividad.php" /> 
		<meta property="og:site_name" content="[Q] interactiva" /> 
		<meta property="og:title" content="Plugin social: Feed de actividad" /> 
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
				<p>Plugin social: Feed de actividad</p>
				<small>Muestra los contenidos e interacciones más recientes e interesantes que han tenido lugar en tu web.</small>
			</blockquote>

			<div class="fb-activity" data-app-id="Display all actions associated with this app ID" data-site="q-interactiva.com" data-action="likes, recommends" data-width="400" data-height="200" data-colorscheme="light" data-header="true"></div>
			
		</div>

		<?php include 'footer_scripts.php'; ?>
	</body>
</html>