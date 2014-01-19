<!DOCTYPE html>
<html>
	<head prefix="og: http://ogp.me/ns#">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta property="og:url" content="http://q-interactiva.com/clientes/v2b/facebook/enviar.php" /> 
		<meta property="og:site_name" content="[Q] interactiva" /> 
		<meta property="og:title" content="Plugin social: Botón Enviar" /> 
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
				<p>Plugin social: Botón "Enviar"</p>
				<small>Permite a los usuarios de Facebook enviar contenido de tu sitio a sus amigos mediante un mensaje privado, correo electrónico o a través de un grupo.</small>
			</blockquote>

			<div class="fb-send" data-href="https://facebook.com/q.interactiva" data-width="300" data-height="The pixel height of the plugin" data-colorscheme="light"></div>

		</div>

		<?php include 'footer_scripts.php'; ?>
	</body>
</html>