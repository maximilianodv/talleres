$(document).ready(function() {
    $("#tablaInstructores").DataTable();
    $('#example1').DataTable();
    $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
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

        var datos = { "nombre": nombre, "apellidop": apellidop, "apellidom": apellidom, "correo": correo, "telefono": telefono, "taller": taller, "horas": horas, "password": password, "convocatoria": convocatoria, "usuario": usuario };

        $.ajax({
            url: "index.php?controlador=ControladorInstructores&accion=uno",
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
            $('#artAgregadoExitoso').show(200).delay(1500).hide(200);
            $("#form_instr")[0].reset();

            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            });
        });
        return false;

    });

});

function modal(e) {
    console.log(e);
    var id = e.getAttribute("data-tpbt");
    var elem = document.getElementsByClassName('modal-titleinst');
    for (var i = 0; i < elem.length; i++) {
        elem[i].setAttribute("diseable","diseable");
    }

}
