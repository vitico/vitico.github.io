<!DOCTYPE html>
<html>
	<head prefix="og: http://ogp.me/ns#">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta property="og:url" content="http://q-interactiva.com/clientes/v2b/facebook/metas.php" /> 
		<meta property="og:site_name" content="[Q] interactiva" /> 
		<meta property="og:title" content="Uso de metas para Facebook" /> 
		<meta property="og:description" content="Aprende cuáles son las principales etiquetas meta que se han de incluir en tu página para que Facebook la pueda compartir de la mejor forma posible." />
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
				<p>Etiquetas metas especiales</p>
				<small>Mejora la forma en que Facebook muestra tu página cuando es compartida.</small>
			</blockquote>
			
			<p>Esta página contiene las etiqeuetas "meta" más habituales para que su contenido se muestre exactamente como nosotros queramos al ser compartido en facebook. Es especialmente importante recordar que para que las etiquetas <strong>&lt;meta /&gt;</strong> sean interpretadas correctamente, se ha de indicar en la etiqueta head el siguiente formato:</p>

			<div class="alert">
    			<strong>&lt;head prefix="og: http://ogp.me/ns#"/&gt;</strong>
    			* recogido en <a href="https://developers.facebook.com/docs/web/tutorials/scrumptious/open-graph-object/">la propia ayuda de Facebook Developers</a>
    		</div>

		</div>

		<?php include 'footer_scripts.php'; ?>
	</body>
</html>