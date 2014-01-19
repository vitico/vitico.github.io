<!DOCTYPE html>
<html>
	<head prefix="og: http://ogp.me/ns#">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta property="og:url" content="http://q-interactiva.com/clientes/v2b/facebook/publicar.php" /> 
		<meta property="og:site_name" content="[Q] interactiva" /> 
		<meta property="og:title" content="Plugin social: Publicación en el muro" /> 
		<meta property="og:description" content="Aprende cómo integrar Facebook en tu propia web." />
		<meta property="og:image" content="http://q-interactiva.com/clientes/v2b/facebook/img/img_fb.png" />

		<title>Integración con Facebook</title>
		<?php include 'headers.php'; ?>
		<link href="css/demos.css" rel="stylesheet" media="screen">
	</head>
	<body>
		
		<div id="fb-root"></div>

	   	<div class="container-fluid">			
			<div class="page-header">
				<h1>Integración de Facebook en tu web</h1>
			</div>
			<?php include 'menu.php'; ?>
			<blockquote>
				<p>API JavaScript: Publicación en el muro</p>
				<small>Publica directamente en el muro del usuario autenticado, mediante el permiso "publish_stream" y la función FB.api.</small>
			</blockquote>

			<div class="row-fluid">
			    <div class="span3">
			    	<button id="login" class="btn btn-primary fb-btn">Login</button>
					<button id="authorize" class="btn btn-warning fb-btn">Autorizar</button>
					<button id="logout" class="btn btn-danger fb-btn">Logout</button>
			    </div>
			    <div class="span4">
			    	<div class="fb-like" data-href="https://facebook.com/q.interactiva" data-width="200" data-colorscheme="light" data-layout="standard" data-action="like" data-show-faces="true" data-send="false"></div>
			    </div>
			    <div class="span5">
			    	<p>Para publicar en tu muro nuestra historia, simplemente <a id="publicar" href="#">haz clic aquí</a>.</p>
			    	<div id="output" class="alert"></div>
			    </div>			    
			</div>

		</div>

		<script src="js/login.js"></script>
		<?php include 'footer_scripts.php'; ?>

		<script>
			/*
			** Versión de uso con jQuery
			** tiene que ir después de la carga del script de jQuery
		  	*/
			$(document).ready(function() {
				$.ajaxSetup({ cache: true });
				$.getScript('//connect.facebook.net/es_ES/all.js', function() {
					FB.init({
						appId: 		APP_ID,
						channelUrl: CHANNEL_URL,
						status: 	true,						
						xfbml: 		true
					});    

					init();
					initPublicacion();
				});
			}); 

			function initPublicacion()
			{
				// Vinculamos el clic del enlace al proceso de 
				// publicación
				$('#publicar').on('click', doPublicacion);
			}

			function doPublicacion(ev)
			{
				var mensaje, enlace, descripcion, imagen;

				// Detenemos el comportamiento normal del clic en el enlace
				ev.preventDefault();
				$('#output').html('Publicando entrada...');

				mensaje = 'Facebook en tu web con video2brain';
				enlace = 'http://video2brain.com';
				descripcion = 'Descubre cómo usar los plugins sociales de Facebook, integrar la API de JavaScript en tu web y lograr así mayor visibilidad para tus contenidos.';
				imagen = 'http://q-interactiva.com/clientes/v2b/facebook/img/img_fb.png';

				FB.api('/me/feed', 'post', { 
					message: mensaje, 
					link: enlace, 
					description: descripcion, 
					picture: imagen 
				}, onPublicado);

				return false;
			}

			function onPublicado (response) 
			{
				if (!response || response.error) 
				{ 
					$('#output').html('Ha ocurrido un error, mira la consola de depuración del navegador para ver su detalle.'); 
					console.log(response.error);
				} 
				else 
				{ 
					$('#output').html('¡Enhorabuena! Se ha publicado correctamente el post con un ID: ' + response.id); 
				}
			}
			// */
		</script>
	</body>
</html>