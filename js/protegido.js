// Constantes de control de estado en Facebook
// https://developers.facebook.com/docs/reference/javascript/FB.getLoginStatus/
var APP_ID = '1476352729172441';
var PAGE_ID = '280586765382942';
var CHANNEL_URL= '//localhost/facebook/channel.php';
var STATUS_CONNECTED = 'connected';
var STATUS_NOT_AUTHORIZED = 'not_authorized';
var STATUS_UNKNOWN = 'unknown';
var PERMISSIONS  = {scope: 'email, user_about_me, user_birthday, user_likes, publish_stream'};

var FB_LIKE_BUTTON = '<fb:like href="https://facebook.com/q.interactiva" width="250" colorscheme="light" layout="standard" action="like" show_faces="false" send="false"></fb:like>';

var uid;
var accessToken;
var isLogginProcess = false;

function init()
{
	FB.Event.subscribe('auth.authResponseChange', controlarStatus);
	
	// Suscripción a los eventos de hacer me gusta y quitar me gusta
	FB.Event.subscribe('edge.create', comprobarFan);
	FB.Event.subscribe('edge.remove', comprobarFan);

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

			// Una vez estamos en disposición, comprobamos si es fan 
			// y mostramos el botón de "me gusta"
			mostrarFBLikeButton();
			comprobarFan();
		} 
		else if (respuesta.status === STATUS_NOT_AUTHORIZED) 
		{
			// Usuario logueado pero sin permisos
			ocultarContenidoProtegido();
			ocultarFBLikeButton();

			$('#authorize').show();
			$('#logout').hide();
			$('#login').hide();
		} 
		else 
		{
			// El usuario no está logueado en Facebook
			ocultarContenidoProtegido();
			ocultarFBLikeButton();

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

			ocultarContenidoProtegido();
			ocultarFBLikeButton();
		}
		else 
		{
			$('#login').show();
			$('#authorize').hide();					
			$('#logout').hide();

			ocultarContenidoProtegido();
			ocultarFBLikeButton();
		}
	}
}

function comprobarFan(href, widget)
{
	FB.api('me/likes/'+PAGE_ID+'?access_token='+accessToken, function(response) 
	{
	    if ( response.data && response.data.length === 1 ) 
	    { 
	        mostrarContenidoProtegido();
	    } 
	    else 
	    {
	        ocultarContenidoProtegido();
	    }
	});
}

function renderFBLikeButton()
{
	FB.XFBML.parse($fbLikeButton[0]);
}

function mostrarFBLikeButton()
{
	$fbLikeButton = $('#fblike');
	$fbLikeButton.html(FB_LIKE_BUTTON);
	setTimeout(renderFBLikeButton, 300);
}

function ocultarFBLikeButton()
{
	$fbLikeButton = $('#fblike');
	$fbLikeButton.html('');
}

function mostrarContenidoProtegido()
{
	var $contenedor = $('#contenedor_protegido');
	var $mensaje = $contenedor.children('p');
	var $protegido = $contenedor.children('#protegido');

	$mensaje.hide();
	$protegido.load('protegido/interior.html');
}

function ocultarContenidoProtegido()
{
	var $contenedor = $('#contenedor_protegido');
	var $mensaje = $contenedor.children('p');
	var $protegido = $contenedor.children('#protegido');

	$mensaje.show();
	$protegido.empty();
}