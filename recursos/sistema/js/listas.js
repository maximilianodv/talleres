
$(document).ready(function()
{
	
	$("#tablaListas").DataTable();

	$("#cbPeriodo").one("change", function()
	{	
		var periodo=$("#cbPeriodo").val();
		//alert(periodo);
       
		var datos={"1":"as","periodo":periodo};
		 $.ajax
            ({
                url:"index.php?controlador=ControladorListas&accion=mostrar",
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
                var objeto=JSON.parse(resultados);
               $("#resultados").html(objeto.periodo);
               $("#divtalleres").html(objeto.talleres);
               //alert("actual");
               //$("#tablaListas").DataTable();
               $.getScript("recursos/sistema/js/listas.js");


              /* 	$('#nuevonivel').show(200).delay(1500).hide(200);
               //$("#nuevonivel").modal('hide');//ocultamos el modal
               $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
    			$('.modal-backdrop').remove();//eliminamos el backdrop del moda*/

            });
  
    });
    $("#cbTaller").one("change", function()
    {
        var taller=$("#cbTaller").val();
        var datos={"taller":taller};

         $.ajax
            ({
                url:"index.php?controlador=ControladorListas&accion=inscritostaller",
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
               $.getScript("recursos/sistema/js/listas.js");


              /*    $('#nuevonivel').show(200).delay(1500).hide(200);
               //$("#nuevonivel").modal('hide');//ocultamos el modal
               $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                $('.modal-backdrop').remove();//eliminamos el backdrop del moda*/

            });
    });

});