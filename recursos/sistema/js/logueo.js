$(document).ready(function() 
{
	$("#btnCancelarSesion").click(function()
	{
		location.href="index.php";
	});

	$("#btnIniciarSesion").click(function()
	{
		
		var usuario=$("#tfUsuariolg").val();

		var password=$("#tfPasswordlg").val();

		var datos={"usuario":usuario,"password":password};
		$.ajax
		({
		  url:"index.php?controlador=ControladorLogueo&accion=loguear",
		  data:datos,
		  type:"POST",
		  success:function(resultado)
		  {
		  	
		  	var objeto=JSON.parse(resultado);
		  	location.href="index.php?controlador="+objeto.controlador;
		  	
		  }
		});
	});
});