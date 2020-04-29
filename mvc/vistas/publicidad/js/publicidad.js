function inscripcion(id)
{
	//var inscrip = document.getElementsByClassName('inscripcion');
  var id=id.getAttribute("data-id");
	const inscrip= document.querySelector('.inscripcion');
  var aceptar = document.querySelector("#btnGuardar");
	aceptar.setAttribute("data-id",id);
  aceptar.setAttribute("onclick","hola(this)");
  alert("termina");
}

function hola(id)
{
  let miPrimeraPromise = new Promise((resolve, reject) => {
    // Llamamos a resolve(...) cuando lo que estabamos haciendo finaliza con éxito, y reject(...) cuando falla.
    // En este ejemplo, usamos setTimeout(...) para simular código asíncrono.
    // En la vida real, probablemente uses algo como XHR o una API HTML5.
    /*setTimeout(function(){
      console.log("jjs");
      resolve("¡Éxito!"); // ¡Todo salió bien!
    }, 250);*/

    const url = 'index.php?controlador=ControladorConvocatorias&accion=historial';
    const http = new XMLHttpRequest();
    const sesion= document.querySelector('.sesion');
    var matricula=sesion.getAttribute("id");
    var params ="matricula="+matricula+"";

      http.open("POST", url,true);
      http.onreadystatechange = function(){

          if(this.readyState == 4 && this.status == 200){
              var resultado = JSON.parse(this.responseText);
              console.log("antes jsjsjsju7ytgjj");
              console.log(resultado);
              console.log(resultado.anio);
              resolve(resultado.cuatrimestre);
          }
        }
        // Ponemos las cabeceras de la solicitud como si fuera un formulario, necesario si se utiliza POST
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //Enviamos la solicitud junto con los parámetros
        http.send(params);
  });

  miPrimeraPromise.then((successMessage) => {
    // succesMessage es lo que sea que pasamos en la función resolve(...) de arriba.
    // No tiene por qué ser un string, pero si solo es un mensaje de éxito, probablemente lo sea.
    console.log("¡Sí! " + successMessage);
    const url = 'index.php?controlador=ControladorPublicidad&accion=inscribirperiodo';
    const http = new XMLHttpRequest();
    var carrera=document.getElementById("cbCarrera").value;
    //var grado=document.getElementById("cbGrado").value;
    var grupo=document.getElementById("tfGrupo").value;
    const aceptar= document.querySelector('#btnGuardar');
    var grado= successMessage;
    const sesion= document.querySelector('.sesion');
    var matricula=sesion.getAttribute("id");
    var idtaller=id.getAttribute("data-id");

    alert(idtaller);
    console.log(carrera);
    console.log(grado);
    console.log(grupo);
    var params = "carrera='"+carrera+"'&grado="+grado+"&grupo='"+grupo+"'&taller="+idtaller+"&matricula="+matricula+"";
    http.open("POST", url);
    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200)
        {
            var resultado = JSON.parse(this.responseText);
            console.log("antes de inscrip");
            console.log(resultado.carrera);
            console.log(resultado.grado);
            console.log(resultado.grupo);
            console.log("justo antes del error ");
            console.log(resultado.matricula);
            console.log(resultado.datos);
            console.log(resultado.abc);

            document.getElementById("talleres").innerHTML = resultado.abc;
            var modal = document.getElementById("exampleModal");

        }
    }
    // Ponemos las cabeceras de la solicitud como si fuera un formulario, necesario si se utiliza POST
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //Enviamos la solicitud junto con los parámetros
    http.send(params);

  });

}
