
$(document).ready(function() 
{

	$('#FMRegistro').attr('autocomplete', 'off');
	
	$("#FMRegistro").on("submit", function()
	{
		var matricula=$('#tfMatricula').val();
		var nombre=$('#tfNombre').val();
		var paterno=$("#tfPaterno").val();	
		var materno=$('#tfMaterno').val();
		var telefono=$('#tfTelefono').val();
		var fechanc=$("#tfFechaNc").val();	
		var calle=$('#tfCalle').val();
		var numero=$('#tfNumero').val();
		var colonia=$("#tfColonia").val();	
		var municipio=$('#tfMunicipio').val();
		var correo=$('#tfCorreoF').val();
		var password=$('#tfPasswordF').val();
		var niv=$("#cbNivel").val();

		console.log(matricula);
		console.log(nombre);
		console.log(paterno);
		console.log(materno);
		console.log(telefono);
		console.log(fechanc);
		console.log(calle);
		console.log(numero);
		console.log(colonia);
		console.log(municipio);
		console.log(correo);
		console.log(niv);
		var datos={"matricula":matricula,"nombre":nombre,"paterno":paterno,"materno":materno,"telefono":telefono,"fechanc":fechanc,"calle":calle,"numero":numero,"colonia":colonia,"municipio":municipio,"correo":correo,"password":password,"niv":niv};
	
		$.ajax
            ({
                url:"index.php?controlador=ControladorRegistros&accion=registrar",
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
                
                //$("#pr").html(resultados);
                //console.log(resultados);
                if(resultados==0)
                {
                	location.href="index.php?controlador=ControladorLogueo";
                }
            
            });

       /*aert(matricula);
        alert(nombre);
        alert(paterno);
		alert(materno);
        alert(telefono);
        alert(fechanc);
		alert(calle);
		alert(numero);
        alert(colonia);
		alert(municipio);
		alert(correo);
       */
        return false;
		

	
	});
});