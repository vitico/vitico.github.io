<!DOCTYPE html>
<html>
	<head prefix="og: http://ogp.me/ns#">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta property="og:url" content="http://q-interactiva.com/clientes/v2b/facebook/compartir.php" /> 
		<meta property="og:site_name" content="[Q] interactiva" /> 
		<meta property="og:title" content="Plugin social: Diálogo compartir" /> 
		<meta property="og:description" content="Aprende cómo integrar Facebook en tu propia web." />
		<meta property="og:image" content="http://q-interactiva.com/clientes/v2b/facebook/img/img_fb.png" />

		<title>Integración con Facebook</title>
		<?php include 'headers.php'; ?>
	</head>
	<body>
		
	   	<div class="container-fluid">			
			<div class="page-header">
				<h1>Integración de Facebook en tu web</h1>
			</div>
			<?php include 'menu.php'; ?>
			<blockquote>
				<p>Plugin social: Diálogo compartir</p>
				<small>Comparte mediante el cuadro de diálogo oficial de Facebook tus páginas en la red social.</small>
			</blockquote>

			<a href="#" 
			  onclick="
			    window.open(
			      'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
			      'facebook-share-dialog', 
			      'width=626,height=436'); 
			    return false;">
			  Compartir en Facebook
			</a>

		</div>

		<?php include 'footer_scripts.php'; ?>
	</body>
</html>