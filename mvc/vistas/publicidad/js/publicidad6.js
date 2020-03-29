$(document).ready(function() 
{	
  
  $("#")
  /*      $("#Pag").on('click',function(e)
      {
        var dir=$(this).attr("data-dir");
        alert("vista"+dir+".php");
                $.ajax
             ({
                url:"index.php",
                data:"controlador=ControladorPublicidad&accion=secciones&pagina="+"vista"+dir,
                type:"GET"
             }).done(function(resultados)
             {
                $("#principal").html(resultados);
             });
      });*/

    /*$(".inscripcion").on('click',function()
      {
        //var nombre=$(this).attr("data-id");
        var id=$(this).attr("data-id");
        var matricula=$(".sesion").attr("id");
       // alert(matricula);
        var datos={"id":id,"matricula":matricula};
         $.ajax
        ({
            url:"index.php?controlador=ControladorPublicidad&accion=inscripcion",
            data:datos,
            dataType:"text",
            async:false,
            type:"POST",
            success: function(data)
                {               //alert('Registro Guardado');
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
           
                    
            //alert("Ups! te han ganado,disculpa");    
                 
                    //$("#"+id+"div").html(resultados);
                    $("#talleres").html(resultados);
            
                 //   setInterval(actualizar,10);
           
            
        }); 
         
        
            //jQuery.getScript("/mvc/vista/publicidad/js/publicidad.js",function( datos , estado , jqxhr ){});
      });
    */
    /*$(".inscripcion").on('click',function()
    {

    });*/

    /*$(".btnGuardar").on('submit',function()
    {

    });*/
   function actualizar()
    {
        var id=$(".sesion").attr("data-id");

        var datos={"id":id};
        
        if(id=!"undefined"||id==""||id==null)
        {
          id="true";
        }
        else
        {
          
          id="false";
        }
       $.ajax
        ({
            url:"index.php?controlador=ControladorPublicidad&accion=mostrar",
            dataType:"text",
            data:datos,
            async:false,
            type:"POST",
            success: function(data)
                {               //alert('Registro Guardado');
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
            
            $("#talleres").html(resultados);

            
        }); 
       //$.getScript("mvc/vista/publicidad/js/publicidad.js");
    }
//   setInterval(actualizar,10000);
});





