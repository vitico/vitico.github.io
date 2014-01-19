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


		<script>
		// Constantes de control de estado en Facebook
		// https://developers.facebook.com/docs/reference/javascript/FB.getLoginStatus/
		var APP_ID = '1476352729172441';
		var CHANNEL_URL= '//localhost/facebook/channel.php';
		var STATUS_CONNECTED = 'connected';
		var STATUS_NOT_AUTHORIZED = 'not_authorized';
		var STATUS_UNKNOWN = 'unknown';
		var PERMISSIONS  = {scope: 'email, user_about_me, user_birthday, publish_stream'};
		
		var uid;
		var accessToken;
		var isLogginProcess = false;

		function writeOutput(msg)
		{
			var $output = $('.output');
			var content = $output.html();
			$('.output').html(content + msg + '<br/>');
		}		

		function doLogin (ev)
		{
			writeOutput('Solicitando login...');
			isLogginProcess = true;
			FB.login(controlarStatus, PERMISSIONS);
		}

		function doAuthorize (ev)
		{
			writeOutput('Solicitando autorización...');
			isLogginProcess = true;
			FB.login(controlarStatus, PERMISSIONS);
		}

		function doLogout (ev)
		{
			writeOutput('Solicitando logout...');
			FB.logout(controlarStatus);
		}

		function authResponseChange (respuesta)
		{
			writeOutput('Evento AuthResponseChange: '+respuesta.status);
			controlarStatus(respuesta);
		}

		function statusChange (respuesta)
		{
			writeOutput('Evento StatusChange: '+respuesta.status);
			controlarStatus(respuesta);
		}

		function controlarStatus(respuesta)
		{
			if (respuesta.authResponse)
			{
				writeOutput('Control status (con respuesta): '+respuesta.status);
				if (respuesta.status === STATUS_CONNECTED) 
				{
					/* 
						El usuario está logueado y además ha sido autenticado por
						la aplicación. En este caso, respuesta.authResponse contiene el ID 
						del usuario, un token de acceso válido, una petición firmada y el momento
						en que el token de acceso y la petición firmada caducarán
					*/

					// Podriamos guardar datos como el userID y el token de acceso
					uid = respuesta.authResponse.userID;
					accessToken = respuesta.authResponse.accessToken;

					$('#logout').show();
					$('#authorize').hide();
					$('#login').hide();
				} 
				else if (respuesta.status === STATUS_NOT_AUTHORIZED) 
				{
					/*
						El usuario está logueado en Facebook, pero no ha sido autenticado
						por la aplicación. Se debería permitir mediante un botón o enlace (si se
						hace de forma automática, el cuadro de diálogo puede ser interpretado como 
						un popup a bloquear).
					*/
					$('#authorize').show();
					$('#logout').show();
					$('#login').hide();
				} 
				else 
				{
					// El usuario no está logueado en Facebook
					$('#login').show();
					$('#authorize').hide();
					$('#logout').hide();
				}
			}
			else
			{
				writeOutput('Control Status (sin respuesta): '+respuesta.status);
				
				if (isLogginProcess)
				{
					// Si el usuario viene de un proceso de login, es posible que 
					// haya dado a cancelar en la ventana, por lo que internamente
					// solicitamos un nuevo control de estado del usuario
					// El parámetro true es fundamental para que la petición no se
					// cachee, y por tanto obtengamos el estado real
					isLogginProcess = false;
					FB.getLoginStatus(controlarStatus, true);
				}

				if (respuesta.status === STATUS_NOT_AUTHORIZED) 
				{					
					$('#authorize').show();
					$('#login').hide();
					$('#logout').hide();
				}
				else 
				{
					$('#login').show();
					$('#authorize').hide();					
					$('#logout').hide();
				}
			}
			
			writeOutput('----------------------------------');
		}

		function init()
		{
			// FB.Event.subscribe('auth.login', controlarStatus);
			// FB.Event.subscribe('auth.statusChange', statusChange);
			FB.Event.subscribe('auth.authResponseChange', authResponseChange);

			FB.getLoginStatus(controlarStatus, true);

		    $('#login').on('click', doLogin);
		    $('#authorize').on('click', doAuthorize);
		    $('#logout').on('click', doLogout);
		}

	  	/*
	  	** Versión de uso convencional
	  	** que no dependiera de jQuery
	  	*
	  	window.fbAsyncInit = function() {
		    // Inicialización del SDK JavaScript para Facebook
		    FB.init({
		      appId     : APP_ID,		// App ID para conexión con Facebook
		      channelUrl: CHANNEL_URL,	// Ruta al fichero channel para cross-domain
		      status    : false,		// Comprobar el estado de login de inicio
		      xfbml     : true			// true para compatibilidad con social plugins
		    });

		    // Aquí, ya podemos inicializar nuestros procesos
		    init();		    
		}; 

		// Carga del SDK de forma asíncrona
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/es_ES/all.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk')); // */
		</script>

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
						status: 	false,						
						xfbml: 		true
					});    

					init();
				});
			}); // */
		</script>
	</body>
</html>