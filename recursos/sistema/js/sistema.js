$(document).ready(function()
{

	$(".pagina").click(function()
	{
	 var menu=$(this).attr("data-menu");
	 var titulo=$(this).attr("data-titulo");
	 var cabecera='\
	 \n <h1>'+titulo+'<small>UARM</small></h1>\
	 \n      <ol class="breadcrumb">\
	 \n        <li>\
	 \n            <i class="fa fa-dashboard"></i>'+menu+'\
	 \n        </li>\
	 \n        <li class="active">'+titulo+'</li>\
	 \n      </ol>\ ';
	 $(".content-header").html(cabecera);

	 $.ajax
	 ({
	 	url:"index.php",
	 	data:"controlador="+$(this).attr("data-control"),
	 	type:"GET"
	 }).done(function(resultados)
	 {
	 	$("#contenido").html(resultados);
	 });
    });
    
    $("#btnCerrarSesion").click(function()
    {
     $.ajax
     ({
     	url:"index.php",
	 	data:"controlador=ControladorLogueo&accion=cerrarSesion",
	 	type:"GET",
	 	success:function(resultado)
	 	{
	 		location.href="index.php";
	 		
	 	}
     });
    });
});