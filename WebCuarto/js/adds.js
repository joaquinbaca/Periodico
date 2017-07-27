var k1 = 0;
var k2 = 0;

nextPic1();
nextPic2();

function nextPic1() {
    var img = document.getElementsByClassName('imagen-publi-alargada');

    if (k1 == img.length)
        k1 = 0;

    for (var i = 0; i < img.length; i++) {
        if (i == k1)
            img[i].style.display = "block";
        else
            img[i].style.display = "none";
    }
    k1++;
}

function nextPic2() {
    var img = document.getElementsByClassName('imagen-publi');

    if (k2 == img.length)
        k2 = 0;

    for (var i = 0; i < img.length; i++) {
        if (i == k2)
            img[i].style.display = "block";
        else
            img[i].style.display = "none";
    }
    k2++;
}

function timerPic1() {
    setInterval(nextPic1, 10000);
}

function timerPic2() {
    setInterval(nextPic2, 10000);
}

function editarPublicidad(id)
{
    // primero averiguamos que anuncio tenemos que modificar
    var idAnuncio = 0;
    var ids = document.getElementsByClassName('id-oculto');
    for (var i = 0; i < ids.length; i++) {
        if (ids[i].innerHTML == id) {
            idAnuncio = i;
            break;
        }
    }

    // despues modificamos
    var forms = document.getElementsByClassName('form-publi-gestion-edicion');
    var tmp = forms[idAnuncio].style.display;
    if (tmp == "flex")
        forms[idAnuncio].style.display = "none";
    else
        forms[idAnuncio].style.display = "flex";
}