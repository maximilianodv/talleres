function inscripcion(id)
{
	//var inscrip = document.getElementsByClassName('inscripcion');
    var id=id.getAttribute("data-id");
	const inscrip= document.querySelector('.inscripcion');
    var aceptar = document.querySelector("#btnGuardar"); 
	aceptar.setAttribute("data-id",id);
    aceptar.setAttribute("onclick","hola(this);");
    alert("termina");
}
function hola(id)
{

const url = 'index.php?controlador=ControladorPublicidad&accion=inscribirperiodo';
const http = new XMLHttpRequest();
var carrera=document.getElementById("cbCarrera").value;
var grado=document.getElementById("cbGrado").value;
var grupo=document.getElementById("tfGrupo").value;
const aceptar= document.querySelector('#btnGuardar');

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
        console.log("antes ");
        console.log(resultado.carrera);
        console.log(resultado.grado);
        console.log(resultado.grupo);
        console.log("justo antes del error ");
        console.log(resultado.matricula);
        console.log(resultado.datos);
        console.log(resultado.abc);
        //var myElement.innerHTML = "<p>Hello World</p>";

        document.getElementById("talleres").innerHTML = resultado.abc;
        var modal = document.getElementById("exampleModal");
        //modal.close();

               // alert(this.responseText);

    /*       var resultado = JSON.parse(this.responseText);
          console.log(resultado.datos);*/
    }
}
// Ponemos las cabeceras de la solicitud como si fuera un formulario, necesario si se utiliza POST
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//Enviamos la solicitud junto con los parámetros
http.send(params);
}
