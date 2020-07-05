
$(document).ready(function()
{
	$.ajaxSetup({ cache: false });
	var cargandoed=document.getElementById("loadEd");
	//cargandoed.style.display="none";
	$("#tablaConvocatorias").DataTable();
	$("#tfMax").on("change",function()
		{
			//alert("tfmax");
			var tfmax = document.getElementById("tfMax");
			/*var align = tfmax.getAttribute("max");
			alert(align);*/

			var align=document.getElementById("tfMax").value;

			var b = document.getElementById("tfMin");
			var newtamaño=align-1;
			b.setAttribute("max", newtamaño);

		});

	$("#tfMax").on("keypress",function()
	{
		//alert("abcdooo");
	});

	$("#tfMin").on("change",function()
		{
			//alert("DDDD");
		});

	$("#form_conv").on("submit",function()
	{
		var apertura=$('#tfFechaConvocatoria').val();
		var anio=$('#tfAnio').val();
		var min=$('#tfMin').val();
		var max=$('#tfMax').val();
		var claveper=$('#cbPeriodo').val();
		var periodo = $('#cbPeriodo option:selected').text();
		var finconvocatoria=$('#tfFinCnv').val();
		var inicioprg=$('#tfInicioPrg').val();
		var finprg=$('#tfFinPrg').val();
		var mining=$("#tfMinING").val();
		var maxing=$("#tfMaxING").val();

		var datos={"apertura":apertura,"anio":anio,"min":min,"max":max,"periodo":periodo,"claveper":claveper,"finconvocatoria":finconvocatoria,"inicioprg":inicioprg,"finprg":finprg,"mining":mining,"maxing":maxing};
		$.ajax
		({
			url:"index.php?controlador=ControladorConvocatorias&accion=registrar",
			data:datos,
			type:"POST",
			success: function(data)
		 		{        		//alert('Registro Guardado');
        		console.log("Enviado");
        		},
      		error: function()
      			{

        		console.log("Error en el envio de datos");
      			}

		}).done(function(resultados)
		{

			$("#resultados").html(resultados);
			$.getScript( "recursos/sistema/js/convocatorias.js");

		});

		return false;

	});

	$(".activar").on("click",function(e)
	{
		//alert("AV");
		var n=0;
		var id=$(this).attr("id");
		var clave=$(this).attr("data-id");
		var after=$(this).attr("data-after");
		    //console.log($(this).data("id"));
		//alert(after);
		var cambio=null;
		var actual=$(".act1").attr("id");

		$("#modalconfirmar").modal('show');
		estado=$("#"+clave).prop('checked');

		if(id!=actual)
		{
				if(after!=1)
			{
				$("#mensaje").html("Confirmar activación");
			}
			else
			{
				$("#mensaje").html("Confirmar desactivación");
			}
		}
		else
		{
					$("#mensaje").html("Esta activo");
					$("#modalconfirmar").modal('hide');
		}
		$("#modal-btn-si").on("click", function()
		{
			if(n==0)
			{

					$.ajax
					({
						url:"index.php",
						data:"controlador=ControladorConvocatorias&accion=cambiarestado&idconvocatoria="+clave+"&nuevoestado="+estado,
						type:"GET",
				 		success: function(data)
				 		{
		        		console.log("Enviado");
		        		//alert("se envio"+clave)
		        		//alert('Data from the server' + data);
		      			},
		      			error: function()
		      			{
		        		alert('Error en el envio de datos');
		      			}
					}).done(function(resultados)
					{
						$("#modalconfirmar").modal('hide');
						//$.getScript("recursos/sistema/js/articulosadmin.js");
						cambio=true;
						$(".activar").attr("data-after",0);
						$(".activar").attr("class","activar act0");

						$("#"+id).attr("class","activar act1");
						$("#"+id).attr("data-after",1);


						//alert("dsds");
						//alert(resultados);

					});

						n++;
					}

		});
		$("#modal-btn-no").on("click", function()
		{			cambio=false;
					if(n==0)
					{

						if(id!=actual)
						{
							$(".activar").prop('checked',false);
							$(".activar").attr("data-after",0);
 							$("#"+actual).prop('checked',true);

						}
						n++;
					}


					$("#modalconfirmar").modal('hide');


		});
		$("#modalconfirmar").on('hidden.bs.modal', function ()
		{
			if(n==0)
			{
				if(id!=actual)
						{
							$("#"+actual).prop('checked',true);

						}
						n++;
			}



    	});

	});
	$(".btnEliminar").on("click",function(e)
	{
		//alert("AV");
		var n=0;
		var id=$(this).attr("id");
		var clave=$(this).attr("data-clave");
		var after=$(this).attr("data-after");
		    //console.log($(this).data("id"));
		//alert(after);
		var cambio=null;
		var actual=$(".act1").attr("id");


$("#mensaje").html("Confirmar Eliminación");

		$("#modal-btn-si").on("click", function()
		{

					$.ajax
					({
						url:"index.php",
						data:"controlador=ControladorConvocatorias&accion=eliminar&idconvocatoria="+clave,
						type:"GET",
				 		success: function(data)
				 		{
		        		console.log("Enviado");
		        		//alert("se envio"+clave)
		        		//alert('Data from the server' + data);
		      			},
		      			error: function()
		      			{
		        		alert('Error en el envio de datos');
		      			}
					}).done(function(resultados)
					{
						$("#resultados").html(resultados);
						$.getScript( "recursos/sistema/js/convocatorias.js");
						$("#modalconfirmar").modal('hide');

					});



		});
		$("#modal-btn-no").on("click", function()
		{
			$("#modalconfirmar").modal('hide');

		});


	});
	$(".btnEditar").on("click",function()
	{
		var clave=$(this).attr("data-clave");

					var comboreal=clave.substring(4,clave.length);

					/*var $cbper = $('#cbPeriodoEd');
					$cbper.attr("selected",false);*/
					$("#cbPeriodoEd option[value='912']").attr("selected",false);
					$("#cbPeriodoEd option[value='14']").attr("selected",false);
					$("#cbPeriodoEd option[value='58']").attr("selected",false);
					$("#cbPeriodoEd option[value='"+comboreal+"']").attr("selected", true);

					var form=document.getElementById("form_convedit");

					form.style.visibility = "hidden";

					cargandoed.style.display="inline";

					$.ajax
					({
						url:"index.php",
						data:"controlador=ControladorConvocatorias&accion=buscar&idconvocatoria="+clave,
						type:"GET",
				 		success: function(data)
				 		{
		        		console.log("Enviado");
		        		//alert("se envio"+clave)
		        		//alert('Data from the server' + data);
		      			},
		      			error: function()
		      			{
		        		alert('Error en el envio de datos');
		      			}
					}).done(function(resultados)
					{


						var objeto=JSON.parse(resultados);
						//$('#content').fadeIn(1000).html(data);


					}).then(exito, fracaso);


						function exito()
						{

							form.style.visibility ="";

							cargandoed.style.display="none";

						}
						function fracaso()
						{

						}

	});

});
