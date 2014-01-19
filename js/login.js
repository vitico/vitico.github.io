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

function init()
{
	FB.Event.subscribe('auth.authResponseChange', controlarStatus);
	FB.getLoginStatus(controlarStatus, true);

    $('#login').on('click', doLogin);
    $('#authorize').on('click', doAuthorize);
    $('#logout').on('click', doLogout);
}

function doLogin (ev)
{
	isLogginProcess = true;
	FB.login(controlarStatus, PERMISSIONS);
}

function doAuthorize (ev)
{
	isLogginProcess = true;
	FB.login(controlarStatus, PERMISSIONS);
}

function doLogout (ev)
{
	FB.logout(controlarStatus);
}

function controlarStatus(respuesta)
{
	if (respuesta.authResponse)
	{
		if (respuesta.status === STATUS_CONNECTED) 
		{
			uid = respuesta.authResponse.userID;
			accessToken = respuesta.authResponse.accessToken;

			$('#logout').show();
			$('#authorize').hide();
			$('#login').hide();
		} 
		else if (respuesta.status === STATUS_NOT_AUTHORIZED) 
		{
			// Usuario logueado pero sin permisos
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
		if (isLogginProcess)
		{
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
}

/*
** Versión de uso convencional
** que no dependiera de jQuery
*
window.fbAsyncInit = function() {
	// Inicialización del SDK JavaScript para Facebook
	FB.init({
	  appId     : APP_ID,			// App ID para conexión con Facebook
	  channelUrl: CHANNEL_URL,		// Ruta al fichero channel para cross-domain
	  status    : false,			// Comprobar el estado de login de inicio
	  xfbml     : true				// true para compatibilidad con social plugins
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