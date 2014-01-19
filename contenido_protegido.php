<!DOCTYPE html>
<html>
	<head prefix="og: http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta property="og:url" content="http://q-interactiva.com/clientes/v2b/facebook/contenido_protegido.php" /> 
		<meta property="og:site_name" content="[Q] interactiva" /> 
		<meta property="og:title" content="API Javascript: Contenido Protegido" /> 
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
				<p>API JavaScript: Contenido protegido</p>
				<small>Permite acceder a algunos contenidos de la web solamente a usuarios de Facebook que sean fans de tu página.</small>
			</blockquote>

			<div class="row-fluid">
			    <div class="span3">
			    	<button id="login" class="btn btn-primary fb-btn">Login</button>
					<button id="authorize" class="btn btn-warning fb-btn">Autorizar</button>
					<button id="logout" class="btn btn-danger fb-btn">Logout</button>
			    </div>
			    <div id="contenedor_protegido" class="span5">
			    	<p id="mensaje_bloqueado">Solamente puedes acceder al archivo si eres fan de nuestra página. Hazte fan (o loguéate antes si no lo estás) para poder descargarlo.</p>
			    	<div id="protegido"></div>
			    </div>		
			    <div id="fblike" class="span4">
			    	
			    </div>
			</div>

		</div>

		<script src="js/protegido.js"></script>
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
						cookie: 	true,
						status: 	false,						
						xfbml: 		true
					});    

					init();
				});
			}); // */
		</script>
	</body>
</html>