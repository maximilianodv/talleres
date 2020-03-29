$(document).ready(function()
{

	$("#tablaNiveles").DataTable();

	$("#btnGuardar").on("click", function()
	{	
		
		
    	var clave=$('#tfClaveNivel').val();
		
		var nombre=$('#tfNombreNivel').val();
		var datos={"clave":clave,"nombre":nombre};
		
		 $.ajax
            ({
                url:"index.php?controlador=ControladorNiveles&accion=insertar",
                data:datos,
                type:"POST",
                success: function(data)
                    {
                    //alert('Registro Guardado');
                    console.log("Enviado");
                    //alert('Data from the server' + data);
                    },
                error: function()
                    {
                    //alert('Error en el envio de datos');
                    console.log("Error en el envio de datos");
                    }
            }).done(function(resultados)
            {
                
               $("#resultados").html(resultados);
               	$('#nuevonivel').show(200).delay(1500).hide(200);
               //$("#nuevonivel").modal('hide');//ocultamos el modal
               $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
    			$('.modal-backdrop').remove();//eliminamos el backdrop del moda

            });
  
    });

});