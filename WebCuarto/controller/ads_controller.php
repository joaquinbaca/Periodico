<?php

if (file_exists("model/ads_model.php"))
    include_once("model/ads_model.php");
else
    include_once("../model/ads_model.php");

class AdsController
{
    private $ads;

    public function __construct()
    {
        $this->ads = new ManageAds();
    }

    public function anunciosPortada()
    {
        $arrayFoo = $this->ads->getAnunciosPortada();

        echo '<div id="publi-alargada">';
        for ($i = 0; $i < count($arrayFoo); $i++) {
            echo '<img class="imagen-publi-alargada" src="img/' . $arrayFoo[$i]->getNombrePublicidad() . '" alt="' . $arrayFoo[$i]->getAltPublicidad() . '">';
        }
        echo '</div>';
    }

    public function anunciosPortadaGestion()
    {
        $arrayFoo = $this->ads->getAnunciosPortada();

        echo '<div id="contenedor-publi-gestion">';
        for ($i = 0; $i < count($arrayFoo); $i++) {
            echo "<div class='publi-gestion-x'>";
            echo "<span class='id-oculto'>" . $arrayFoo[$i]->getIdPublicidad() . "</span>";
            echo "<p class='publi-gestion-alt'>Alt: <span class='publi-gestion-alt-span'>" . $arrayFoo[$i]->getAltPublicidad() . "</span></p>";
            echo "<div class='publi-gestion-organizador'>";
            echo '<img class="publi-gestion-img" src="../img/' . $arrayFoo[$i]->getNombrePublicidad() . '" alt="' . $arrayFoo[$i]->getAltPublicidad() . '">';
            echo "<div>";
            echo "<form action='../config/erase_ad.php' method='post'>";
            echo "<input type='hidden' name='id_publicidad' value='" . $arrayFoo[$i]->getIdPublicidad() . "'>";
            echo "<input class='boton-eliminar' type='submit' value='Eliminar'>";
            echo "</form>";
            echo "<button class='boton-modificar' type='button' onclick='editarPublicidad(" . $arrayFoo[$i]->getIdPublicidad() . ")'>Modificar</button>";
            echo "</div>";
            echo "</div>";
            // formulario oculto edicion
            echo "<form class='form-publi-gestion form-publi-gestion-edicion' action='../config/update_ad.php' method='post'>";
            echo "<input type='hidden' name='id_publicidad' value='" . $arrayFoo[$i]->getIdPublicidad() . "'>";
            echo "<div>";
            echo "<span>Alt anuncio:  </span>";
            echo "<input type='text' name='alt_publicidad' value='" . $arrayFoo[$i]->getAltPublicidad() . "'>";
            echo "</div>";
            echo "<input type='file' name='nombre_publicidad' accept='image/*' required>";
            echo "<input type='submit' value='Modificar'>";
            echo "</form>";
            // fin - formulario oculto edicion
            echo "<hr>";
            echo "</div>";
        }
        echo '</div>';
        echo "<h2>Añadir nuevo anuncio</h2>";
        echo "<form class='form-publi-gestion' action='../config/add_ad.php' method='post'>";
        echo "<input type='hidden' name='tipo_publicidad' value='portada'>";
        echo "<div>";
        echo "<span>Alt anuncio:  </span>";
        echo "<input type='text' name='alt_publicidad'>";
        echo "</div>";
        echo "<input type='file' name='nombre_publicidad' accept='image/*' required>";
        echo "<input class='confirmar-enviar' type='submit' value='Enviar' required>";
        echo "</form>";
    }

    public function anunciosNoticia()
    {
        $arrayFoo = $this->ads->getAnunciosNoticia();

        echo '<div id="publi">';
        for ($i = 0; $i < count($arrayFoo); $i++) {
            echo '<img class="imagen-publi" src="../img/' . $arrayFoo[$i]->getNombrePublicidad() . '" alt="' . $arrayFoo[$i]->getAltPublicidad() . '">';
        }
        echo '</div>';
    }

    public function anunciosNoticiaGestion()
    {
        $arrayFoo = $this->ads->getAnunciosNoticia();

        echo '<div id="contenedor-publi-gestion">';
        for ($i = 0; $i < count($arrayFoo); $i++) {
            echo "<div class='publi-gestion-x'>";
            echo "<span class='id-oculto'>" . $arrayFoo[$i]->getIdPublicidad() . "</span>";
            echo "<p class='publi-gestion-alt'>Alt: <span class='publi-gestion-alt-span'>" . $arrayFoo[$i]->getAltPublicidad() . "</span></p>";
            echo "<div class='publi-gestion-organizador'>";
            echo '<img class="publi-gestion-img" src="../img/' . $arrayFoo[$i]->getNombrePublicidad() . '" alt="' . $arrayFoo[$i]->getAltPublicidad() . '">';
            echo "<div>";
            echo "<form action='../config/erase_ad.php' method='post'>";
            echo "<input type='hidden' name='id_publicidad' value='" . $arrayFoo[$i]->getIdPublicidad() . "'>";
            echo "<input class='boton-eliminar' type='submit' value='Eliminar'>";
            echo "</form>";
            echo "<button class='boton-modificar' type='button' onclick='editarPublicidad(" . $arrayFoo[$i]->getIdPublicidad() . ")'>Modificar</button>";
            echo "</div>";
            echo "</div>";
            // formulario oculto edicion
            echo "<form class='form-publi-gestion form-publi-gestion-edicion' action='../config/update_ad.php' method='post'>";
            echo "<input type='hidden' name='id_publicidad' value='" . $arrayFoo[$i]->getIdPublicidad() . "'>";
            echo "<div>";
            echo "<span>Alt anuncio:  </span>";
            echo "<input type='text' name='alt_publicidad' value='" . $arrayFoo[$i]->getAltPublicidad() . "'>";
            echo "</div>";
            echo "<input type='file' name='nombre_publicidad' accept='image/*' required>";
            echo "<input type='submit' value='Modificar'>";
            echo "</form>";
            // fin - formulario oculto edicion
            echo "<hr>";
            echo "</div>";
        }
        echo '</div>';
        echo "<h2>Añadir nuevo anuncio</h2>";
        echo "<form class='form-publi-gestion' action='../config/add_ad.php' method='post'>";
        echo "<input type='hidden' name='tipo_publicidad' value='noticia'>";
        echo "<div>";
        echo "<span>Alt anuncio:  </span>";
        echo "<input type='text' name='alt_publicidad'>";
        echo "</div>";
        echo "<input type='file' name='nombre_publicidad' accept='image/*' required>";
        echo "<input class='confirmar-enviar' type='submit' value='Enviar' required>";
        echo "</form>";
    }
}