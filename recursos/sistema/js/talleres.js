
$(document).ready(function() 
{	
      
     $("#input-44").fileinput({
            uploadUrl: 'index.php?controlador=ControladorTalleres&accion=subirtemario',
            maxFilePreviewSize: 10240,
            maxFileSize:1000 
        });
	 $("#input-b5").fileinput({
        showUpload: false,
         maxFilePreviewSize: 10240,
         maxFileSize:50000,
        dropZoneEnabled: false});
      $("#input-b6").fileinput({
        showUpload: false,
        maxFileSize:50000,
        maxFilePreviewSize: 10240,
        dropZoneEnabled: false});
	 $("#miarchivo").fileinput({
       
        showUpload: false,
        elErrorContainer: '#kartik-file-errors',
        allowedFileExtensions: ["jpg", "png", "gif"]
        //uploadUrl: '/site/file-upload-single'
    });
        $("#input-701").fileinput({
        uploadUrl: "/file-upload-batch/1",
        uploadAsync: false,
        maxFileCount: 5
    });

	   
	$("#tablaTalleres").DataTable();	
	$('#example1').DataTable();
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });

    $("#btnCnvTSU").on("click",function(e)
    {
          
        $.ajax
        ({
            url:"index.php?controlador=ControladorTalleres&accion=reportes",
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
            
            $("#resultados").html(resultados);
            
        }); 
    });
    $('#id').on("change",function(e)
    {
        //alert($(this).val());
        if($(this).val()=="")
        {
         
            $("#divTSU").attr("class","col-md-4 dias ocultarboton");
            $("#divING").attr("class","col-md-4 dias ocultarboton");
            $("#hrTSU").attr("class","col-md-4 dias ocultarboton");
            $("#hrING").attr("class","col-md-4 dias ocultarboton");
            $("#hrInicioTSU").attr("class","ocultarboton");
            $("#hrFinTSU").attr("class","ocultarboton");
            $("#hrInicioING").attr("class","ocultarboton");
            $("#hrFinING").attr("class","ocultarboton");
        }
        else if($(this).val()=="TSU"||$(this).val()=="ING")
        {
            //$("#div"+$(this).val()).html(resultados);
            //$(".col-md-4 ocultarboton").attr("class",".col-md-4");
            $(".dias").attr("class","col-md-4 dias ocultarboton");
            $(".bootstrap-timepicker").attr("class","ocultarboton");
            $("#div"+$(this).val()).attr("class","col-md-4");
           // $("#hr"+$(this).val()).attr("class","col-md-4");
             $("#hrInicio"+$(this).val()).attr("class","col-md-4 bootstrap-timepicker");
             $("#hrFin"+$(this).val()).attr("class","col-md-4 bootstrap-timepicker");
            
                
        }
        else
        {
            $("#divTSU").attr("class","col-md-4 dias");
            $("#divING").attr("class","col-md-4 dias");
              $("#hrTSU").attr("class","col-md-4 dias");
            $("#hrING").attr("class","col-md-4 dias");
            $("#hrInicioTSU").attr("class","col-md-4 bootstrap-timepicker");
            $("#hrFinTSU").attr("class","col-md-4 bootstrap-timepicker");
            $("#hrInicioING").attr("class","col-md-4 bootstrap-timepicker");
            $("#hrFinING").attr("class","col-md-4 bootstrap-timepicker");
            
        }

        
    });
    	$("#form_taller").on("submit", function(e)
	{	
		
		e.preventDefault();

            var f = $(this);
            var formData = new FormData(document.getElementById("form_taller"));
            formData.append("dato", "valor");
            var request=new XMLHttpRequest();


            //formData.append(f.attr("name"), $(this)[0].files[0]);
            $.ajax({
                url: "index.php?controlador=ControladorTalleres&accion=subirtemario",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
			     processData: false
            })
                .done(function(res)
                {
                    //alert("arriba");
                    console.log("arriba");
                	/*request.upload.addEventListener('progress',function(e)
                    {
                        var porcent=e.loaded/e.total*100;
                        console.log(porcent);
                    });    */           	
                });
			
    });
    
 	$("#form_taller").on("submit", function()
    {

        var taller=$('#tfTaller').val();
        //alert(taller);
        var horas=$('#tfHoras').val();
        //alert(horas);
        var usuario=$("#tfUsuario").val();
        //alert(usuario);
        //alert($("#input-b5").val());
        var temario="recursos/sistema/temarios/"+document.getElementById('input-b5').files[0].name;
        //alert(temario);
        var periodo=$("#cbPeriodo").val();
        //alert(periodo);
        var carrera=$("#id").val();
        var numtll=carrera.length;
        var dia=[];
        var hinicio=[];
        var hfin=[];
        if(numtll==1)
        {

            dia.push($("#cbdia"+carrera+"").val());
            hinicio.push($("#"+carrera+"hi").val());
            hfin.push($("#"+carrera+"hf").val());

        }
        else
        {
            dia.push($("#cbdia"+carrera[0]+"").val());
            dia.push($("#cbdia"+carrera[1]+"").val());
            hinicio.push($("#"+carrera[0]+"hi").val());
            hinicio.push($("#"+carrera[1]+"hi").val());
            hfin.push($("#"+carrera[0]+"hf").val());
            hfin.push($("#"+carrera[1]+"hf").val());
        }
        
        console.log(dia);
        
        var uno=carrera[0];
        

       // var convocatoria=$("#tfConvocatoria").val();
        
        //var temario=$("#tfTemario").val();
        //var datos={"taller":taller,"horas":horas,"convocatoria":convocatoria,"usuario":usuario,"temario":temario};
        var datos={"taller":taller,
                    "horas":horas,
                    "usuario":usuario,
                    "temario":temario,
                    "periodo":periodo,
                    "carrera":carrera,
                    "cant":numtll,
                    "dias":dia,
                    "inicio":hinicio,
                    "fin":hfin};
       $.ajax
            ({
                url:"index.php?controlador=ControladorTalleres&accion=registrar",
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
                $('#artAgregadoExitoso').show(200).delay(1500).hide(200);
                $("#form_taller")[0].reset();
                //$("select.select2").select2('data', {}); // clear out values selected
                $('#example2').DataTable({
                      'paging'      : true,
                      'lengthChange': false,
                      'searching'   : false,
                      'ordering'    : true,
                      'info'        : true,
                      'autoWidth'   : false
                    });
                //$(".select2").empty().trigger('change');
                $(".select2").val('').trigger('change');
                $(".selectC").val('').trigger('change');
                //$(".selectC").empty().trigger('change');
                  // $('.select2').val("");
                    //$('.selectC').val("");

            });
            return false;

    });
 
 
});





   