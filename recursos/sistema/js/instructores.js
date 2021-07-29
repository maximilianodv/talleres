$(document).ready(function() {

    $("#tablaInstructores").DataTable();

});

$("#btnEditarU").on("click",function(e)
{
  const idIntruc =e.getAttribute("data-id");
  console.log(idIntruc);
  var datos = { "idInstructor": idIntruc};
  $.ajax({
      url: "index.php?controlador=ControladorInstructores&accion=datosEditar",
      data: datos,
      type: "POST",
      success: function(data) {
          //alert('Registro Guardado');
          console.log("Enviado");
          //alert('Data from the server' + data);
      },
      error: function() {
          //alert('Error en el envio de datos');
          console.log("Error en el envio de datos");
      }
  }).done(function(resultados) {
      console.log(resultados);
      $("#resultados").html(resultados);
  });
});

$("#form_instr").on("submit", function() {
    var nombre = $('#tfNombre').val();
    var apellidop = $('#tfApellidoP').val();
    var apellidom = $('#tfApellidoM').val();
    var correo = $('#tfCorreo').val();
    var telefono = $('#tfTelefono').val();
    var taller = $('#tfTaller').val();
    var horas = $('#tfHoras').val();
    var password = $('#tfPassword').val();
    var convocatoria = $("#tfConvocatoria").val();
    var usuario = $("#tfNomUsuario").val();
    //var instructor=$('#idInstructor').val();
    var instructor=document.getElementById("idInstructor").value;

    var direccion="";
    var textrespuesta='';
    if(instructor==""){
        direccion="uno";
        textrespuesta='artAgregadoExitoso';
    }else{
      direccion="modificar";
      textrespuesta='artModExitoso';
    }
    var datos = {"oldInstructor":instructor, "nombre": nombre, "apellidop": apellidop, "apellidom": apellidom, "correo": correo, "telefono": telefono, "taller": taller, "horas": horas, "password": password, "convocatoria": convocatoria, "usuario": usuario };
    
    $.ajax({
        url: "index.php?controlador=ControladorInstructores&accion="+direccion,
        data: datos,
        type: "POST",
        success: function(data) {
            //alert('Registro Guardado');
            console.log("Enviado");
            //alert('Data from the server' + data);
        },
        error: function() {
            //alert('Error en el envio de datos');
            console.log("Error en el envio de datos");
        }
    }).done(function(resultados) {

        $("#resultados").html(resultados);
        $('#'+textrespuesta).show(200).delay(1500).hide(200);

        $("#form_instr")[0].reset();

        $("#tablaInstructores").DataTable();
    });
    return false;

});
function enviarideliminar(e){
    
    var variable=e;
    console.log("enviando variable a elimina");
    $("#modal-btn-si").attr("data-ideliminar",variable);
    
}
function eliminar(e){
    console.log("eliminar");
    var idIntruc=e.getAttribute("data-ideliminar");
    console.log(idIntruc);
    var datos = {"idInstructor":idIntruc};
    $.ajax({
        url: "index.php?controlador=ControladorInstructores&accion=eliminar",
        data: datos,
        type: "POST",
        success: function(data) {
            //alert('Registro Guardado');
            console.log("Enviado");
            //alert('Data from the server' + data);
        },
        error: function() {
            //alert('Error en el envio de datos');
            console.log("Error en el envio de datos");
        }
    }).done(function(resultados) {
        $("#resultados").html(resultados);        
        $("#modalconfirmar").modal('hide');
        $("#tablaInstructores").DataTable();
    });

}
function cancelar(){
    $("#modalconfirmar").modal('hide');
}

function modal(e) {
    console.log(e);
    var id = e.getAttribute("data-tpbt");
    var elem = document.getElementsByClassName('modal-titleinst');
    const name= e.getAttribute("data-name");
    console.log(name);
    document.getElementById("agregarlabel").innerHTML =name;

    var idIntruc =e.getAttribute("data-id");
    console.log(idIntruc);
    var datos = { "idInstructor": idIntruc};
    $.ajax({
        url: "index.php?controlador=ControladorInstructores&accion=datosEditar",
        data: datos,
        type: "POST",
        dataType: 'JSON',
        success: function(data) {
            //alert('Registro Guardado');
            console.log("Enviado");
            //alert('Data from the server' + data);
        },
        error: function() {
            //alert('Error en el envio de datos');
            console.log("Error en el envio de datos");
        }
    }).done(function(resultados) {
        console.log(resultados);
        $('#tfNombre').val(resultados.Nombre);
        $('#tfApellidoP').val(resultados.ApellidoP);
        $('#tfApellidoM').val(resultados.ApellidoM);
        $('#tfCorreo').val(resultados.Correo);
        $('#tfTelefono').val(resultados.Telefono);
        $('#tfNomUsuario').val(resultados.Nombreusuario);
        $('#tfPassword').val(resultados.Password);
        $('#idInstructor').val(resultados.id_instructor);
      });
}
