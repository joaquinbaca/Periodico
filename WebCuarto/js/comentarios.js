
function MostrarComentarios() {
    document.getElementById("cajacomentarios").style.width = "400px";
    document.getElementById("contenido-principal").style.marginLeft = "400px";
    document.getElementById("social").style.left = "400px";
}

function OcultarComentarios() {

    document.getElementById("cajacomentarios").style.width = "0";
    document.getElementById("contenido-principal").style.marginLeft = "0";
    document.getElementById("social").style.left = "0";

}

function AnadirComentario(listaPalabras, nombre, correo) {



    var comentarioUsuario = document.Fmensaje.mensajeComentario.value;
    comentarioUsuario = palabrasProhibidas(comentarioUsuario, listaPalabras);
    var nombreUsuario = nombre;
    var correoUsuario = correo;
    var fecha = " - " + Date();

    var contenido1 = document.createTextNode(comentarioUsuario);
    var contenido2 = document.createTextNode(nombreUsuario);
    var contenido3 = document.createTextNode(correoUsuario);
    var contenido4 = document.createTextNode(fecha);

    var midiv = document.createElement("div");
    midiv.setAttribute("id", "comentariox");
    var titulo = document.createElement("h3");
    var date = document.createElement("span");
    date.setAttribute("class", "fechaComentario");
    var parrafo = document.createElement("p");
    parrafo.setAttribute("class", "parrafoComentario");
    var correo = document.createElement("p");
    correo.setAttribute("class", "correoComentario");
    var linea = document.createElement("hr");

    titulo.appendChild(contenido2);
    date.appendChild(contenido4);
    titulo.appendChild(date);
    parrafo.appendChild(contenido1);
    correo.appendChild(contenido3);


    midiv.appendChild(titulo);
    midiv.appendChild(parrafo);
    midiv.appendChild(correo);
    midiv.appendChild(linea);

    document.getElementById("comentario").appendChild(midiv);

}

function palabrasProhibidas(consulta, listaPalabras) {

    listaPalabras = listaPalabras.split(",");

    for (var i = 0; i < listaPalabras.length; i++) {
        consulta = consulta.replace(new RegExp("\\b"+listaPalabras[i]+"\\b"), "*****");
    }

    return consulta;
}

function comprobarCorreo(email) {

    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!expr.test(email)) {
        alert("Error: La dirección de correo " + email + " es incorrecta.");
        return false;
    } else return true;


}

function compartirFB() {
    var divTitle = document.getElementById("noticia-p-titulo");
    var title = divTitle.getElementsByTagName("h1")[0].innerHTML;
    var image = document.getElementById("imagen-noticia").src;
    var str = "Se publicará en Facebook el siguiente mensaje: \"" + title + "\", vía @Cuarto.";
    document.getElementById('texto-compartir').innerHTML = str;
    document.getElementById('imagen-compartir').src = image;
    document.getElementById('compartir').style.display = "block";
}

function compartirTW() {
    var divTitle = document.getElementById("noticia-p-titulo");
    var title = divTitle.getElementsByTagName("h1")[0].innerHTML;
    var image = document.getElementById("imagen-noticia").src;
    var str = "Se publicará en Twitter el siguiente mensaje: \"" + title + "\", vía @Cuarto.";
    document.getElementById('texto-compartir').innerHTML = str;
    document.getElementById('imagen-compartir').src = image;
    document.getElementById('compartir').style.display = "block";
}

function editarComentario(id) {

    // primero averiguamos que comentario tenemos que modificar
    var idComentario = 0;
    var ids = document.getElementsByClassName('id-comentario-config');
    for (var i = 0; i < ids.length; i++) {
        if (ids[i].innerHTML == id) {
            idComentario = i;
            break;
        }
    }

    // despues modificamos
    var forms = document.getElementsByClassName('edicion-comentario');
    var tmp = forms[idComentario].style.display;
    if (tmp == "flex")
        forms[idComentario].style.display = "none";
    else
        forms[idComentario].style.display = "flex";
}