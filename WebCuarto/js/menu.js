var menu = document.getElementById("contenedor-nav");
var distanciaMenu = menu.offsetTop;

function menuFixed() {
    "use strict";
    if (window.pageYOffset > distanciaMenu) {
        menu.style.position = "fixed";
        menu.style.top = "0";
    } else {
        menu.style.position = "relative";
    }
}

window.addEventListener("scroll", menuFixed);

function search(str) {
    // Comprobar si hay algo (o no) escrito
    if (str.length == 0) {
        document.getElementById("resultado-busqueda").innerHTML = "";
        document.getElementById("resultado-busqueda").style.display = "none";
    } else {
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var rep = new RegExp(str, "gi");
                var text = this.responseText
                document.getElementById("resultado-busqueda").innerHTML = text;
                var titulos = document.getElementById("resultado-busqueda").children;
                for (var i = 0; i < titulos.length; i++) {
                    titulos[i].innerHTML = titulos[i].innerHTML.replace(rep, "<span class='highlight'>" + str + "</span>");
                }
                document.getElementById("resultado-busqueda").style.display = "flex";
            }
        }

        if (fileExists("config/new_search.php"))
            xmlhttp.open("GET", "config/new_search.php?q=" + str, true);
        else
            xmlhttp.open("GET", "../config/new_search.php?q=" + str, true);

        xmlhttp.send();
    }
}

function fileExists(str) {
    if (str.length == 0)
        return false;
    else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("HEAD", str, false);
        xmlhttp.send();
        return xmlhttp.status == 200;
    }
}

var menuAbierto = false;

function expandMenu() {
    var elementos = document.getElementById("menu-nav").getElementsByClassName("flexbox")[0].getElementsByTagName("li");

    if (!menuAbierto) {
        for (var i = 1; i < elementos.length; i++) {
            elementos[i].style.height = "auto";
            elementos[i].style.padding = "10px 25px";
            elementos[i].style.visibility = "visible";
            elementos[i].style.opacity = "1";
        }
        menuAbierto = true;
    } else {
        for (var i = 1; i < elementos.length; i++) {
            elementos[i].style.height = "0";
            elementos[i].style.padding = "0";
            elementos[i].style.visibility = "hidden";
            elementos[i].style.opacity = "0";
        }
        menuAbierto = false;
    }

}