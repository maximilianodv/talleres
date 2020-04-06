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

						console.log(resultados);
						let fechainicio=document.getElementById("tfFechaConvocatoriaEd");
						let fechafin=document.getElementById("tfFinCnvEd");
						let maxtsu=document.getElementById("tfMaxEd");
						let mintsu=document.getElementById("tfMinEd");
						let maxing=document.getElementById("tfMaxINGEd");
						let mining=document.getElementById("tfMinINGEd");
						let inicioprg=document.getElementById("tfInicioPrgEd");
						let finprg=document.getElementById("tfFinPrgEd");
						let btnguardar=document.getElementById("btnGuardarMod");
						console.log(btnguardar);
						btnguardar.setAttribute("data-idmod",clave);

						//let periodo=document.getElementById("cbPeriodoEd");

						var objeto=JSON.parse(resultados);
						//alert(objeto.fecha);
						fechainicio.value=objeto.fecha;
						fechafin.value=objeto.cierre;
						maxtsu.value=objeto.esptsumax;
						mintsu.value=objeto.esptsumin;
						maxing.value=objeto.espingmax;
						mining.value=objeto.espingmin;	
						inicioprg.value=objeto.prginicio;
						finprg.value=objeto.prgfin;


						//$('#content').fadeIn(1000).html(data);

						
					}).then(exito, fracaso);

					
						function exito()
						{

							form.style.visibility ="";						

							cargandoed.style.display="none";
							
							//alert(resultados["periodo"]);
							//var objeto=JSON.parse(resultados);
							//console.log(objeto);
						}
						function fracaso()
						{
							alert("error al recibir datos");
						}
					
	});

	
 
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

		$("#form_convedit").on("submit",function()
	{
		
		var apertura=$('#tfFechaConvocatoriaEd').val();
		var idold=document.getElementById("btnGuardarMod").getAttribute("data-idmod");
		alert(idold);
		var min=$('#tfMinEd').val();
		var max=$('#tfMaxEd').val();
		var claveper=$('#cbPeriodoEd').val();
		var periodo = $('#cbPeriodoEd option:selected').text();

		alert(claveper);
		alert(periodo);
		var finconvocatoria=$('#tfFinCnvEd').val();
		var inicioprg=$('#tfInicioPrgEd').val();
		var finprg=$('#tfFinPrgEd').val();
		var mining=$("#tfMinINGEd").val();
		var maxing=$("#tfMaxINGEd").val();
		var anio=apertura.substring(0,4);
		var idnew=anio+claveper;
		var encontrado="";
		alert(idnew+"Este es el id nuevo");
		alert(idold+"Este es el id viejo");
		
		
		var datos={"claveper":idnew};
		$.ajax
		({
			url:"index.php?controlador=ControladorConvocatorias&accion=buscarmodclvper",
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
			//console.log(resultados);

			var objeto=JSON.parse(resultados);
			console.log(objeto.encontrado);
			if(idnew==idold){
				alert("es la misma");
				
			}
			if(objeto.encontrado=="true"&&idnew!=idold){
				alert("ya hay una convocatorias con los mismos datos");
			}

		}).then(function(r){
				var objeto=JSON.parse(r);
				console.log(objeto.encontrado);
				if(objeto.encontrado==false||objeto.encontrado=="false"){
					alert("se ba ja modificar");
					datosmod={"id":idold,"idnew":idnew,"apertura":apertura,"anio":anio,"min":min,"max":max,"periodo":periodo,"claveper":claveper,"finconvocatoria":finconvocatoria,"inicioprg":inicioprg,"finprg":finprg,"mining":mining,"maxing":maxing};
					$.ajax
					({
						url:"index.php?controlador=ControladorConvocatorias&accion=modificar",
						data:datosmod,
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
				}
				if(idnew==idold){
					alert("modificarr el mismo");
				}
				
			});

		
		/*let modificarr=new Promise((resolve, reject) => {
			  // Llamamos a resolve(...) cuando lo que estabamos haciendo finaliza con éxito, y reject(...) cuando falla.
			  // En este ejemplo, usamos setTimeout(...) para simular código asíncrono. 
			  // En la vida real, probablemente uses algo como XHR o una API HTML5.
			  resolve(o); // ¡Todo salió bien!
			});

		modificarr.then((miPrimeraPromise) => {
			  // succesMessage es lo que sea que pasamos en la función resolve(...) de arriba.
			  // No tiene por qué ser un string, pero si solo es un mensaje de éxito, probablemente lo sea.
			  miPrimeraPromise();
				
			});*/

//		modificar();

		return false;
		/*var datos={"apertura":apertura,"anio":anio,"min":min,"max":max,"periodo":periodo,"claveper":claveper,"finconvocatoria":finconvocatoria,"inicioprg":inicioprg,"finprg":finprg,"mining":mining,"maxing":maxing,"id":id};

		
		

		*/

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
	
function modificar(){
	alert("en modificar");
}
