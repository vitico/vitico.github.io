<!DOCTYPE html>
<html>
	<head prefix="og: http://ogp.me/ns#">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta property="og:url" content="http://q-interactiva.com/clientes/v2b/facebook/login.php" /> 
		<meta property="og:site_name" content="[Q] interactiva" /> 
		<meta property="og:title" content="Plugin social: Control de login" /> 
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
				<p>API JavaScript: Control de login</p>
				<small>Controla el estado del usuario con respecto a Facebook, para poder interactuar con él en función de ello.</small>
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
			    <div class="output span5"></div>			    
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
				});
			}); // */
		</script>
	</body>
</html>