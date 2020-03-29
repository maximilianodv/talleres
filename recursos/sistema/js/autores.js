$(document).ready(function() 
{
	$("#tablaAutores").DataTable();
	$("#frmAgregar").on("submit", function(e)
	{	
		var nombre=$('#tfNombresAdd').val();
		alert(nombre);
		var categoria=$('#slcCategoriaAdd').val();
		alert(categoria);
		var datos={"Nombre":nombre,"Categoria":categoria};
		
		 $.ajax({
                         async: true,
                         type: "get",
                         dataType:"json",
                         contentType:"application/x-www-form-urlencoded; charset=UTF-8",
                         url:"index.php?controlador=ControladorAutores&accion=registrar",
                         data:datos,
      		
                         //beforeSend: antesEnvio,
                        success: function(data)
		 					{
		 						//$('#artAgregadoExitoso').show(200).delay(1500).hide(200);
        						//alert('Data from the server' + data);
      						},
                         timeout: 4000,
                         error: function()
			      			{
			        			alert('Error en el envio de datos');
			      			}
                 }).done(function(resultados)
					{
						//$("#resultados").html(resultados);
						if(resultados=='1')
						{
							$('#artAgregadoExitoso').show(200).delay(1500).hide(200);
		 						//$("#nuevousuario").show(200).delay(1500).hide(200);
		 					setTimeout(function(){$("#nuevoautor").modal('toggle')},1500);		
        				}
        				else
        				{
        					alert("registro no almacenado en la base de datos");
        				}

						

						
					});
		
		
    });
 		
});





   