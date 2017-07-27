<?php

if (file_exists("model/sections_model.php")) {
    include_once("model/sections_model.php");
    include_once("model/subsections_model.php");
}
else {
    include_once("../model/sections_model.php");
    include_once("../model/subsections_model.php");
}

class SectionsController
{
    private $sections;
    private $subsections;

    public function __construct()
    {
        $this->sections = new ManageSections();
        $this->subsections = new ManageSubsections();
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

    public function seccionesSubsecciones()
    {
        $arrayFoo1 = $this->sections->getSections();

        echo '<div id="contenedor-secciones-gestion">';
        for ($i = 0; $i < count($arrayFoo1); $i++) {
            echo "<div class='seccion-gestion-x'>";
            echo "<div class='flexbox'>";
            echo "<h2>Sección: " .$arrayFoo1[$i]->getNombreSeccion() . "</h2>";
            echo "<form action='../config/erase_section.php' method='post'>";
            echo "<input type='hidden' name='id_seccion' value='" . $arrayFoo1[$i]->getIdSeccion() . "'>";
            echo "<input class='boton-eliminar' type='submit' value='Eliminar'>";
            echo "</form>";
            echo "<form action='../config/update_section.php' method='post'>";
            echo "<input type='text' name='nombre_seccion' required>";
            echo "<input type='hidden' name='id_seccion' value='" . $arrayFoo1[$i]->getIdSeccion() . "'>";
            echo "<input class='boton-modificar' type='submit' value='Modificar'>";
            echo "</form>";
            echo "</div>";
            echo "<h3>id sección: " . $arrayFoo1[$i]->getIdSeccion() . "</h3>";
            echo "<h4>Subsecciones:</h4>";
            $arrayFoo2 = $this->subsections->getSubsections($arrayFoo1[$i]->getIdSeccion());
            for ($j = 0; $j < count($arrayFoo2); $j++) {
                echo "<div class='flexbox'>";
                echo "<p class='nombre-subseccion'>" .$arrayFoo2[$j]->getNombreSubseccion() . "</p>";
                echo "<form action='../config/erase_subsection.php' method='post'>";
                echo "<input type='hidden' name='id_subseccion' value='" . $arrayFoo2[$j]->getIdSubseccion() . "'>";
                echo "<input class='boton-eliminar' type='submit' value='Eliminar'>";
                echo "</form>";
                echo "<form action='../config/update_subsection.php' method='post'>";
                echo "<input type='text' name='nombre_subseccion' required>";
                echo "<input type='hidden' name='id_subseccion' value='" . $arrayFoo2[$j]->getIdSubseccion() . "'>";
                echo "<input class='boton-modificar' type='submit' value='Modificar'>";
                echo "</form>";
                echo "</div>";
            }
            echo "</div>";
            echo "<hr>";
//            echo "<span class='id-oculto'>" . $arrayFoo[$i]->getIdPublicidad() . "</span>";
//            echo "<p class='publi-gestion-alt'>Alt: <span class='publi-gestion-alt-span'>" . $arrayFoo[$i]->getAltPublicidad() . "</span></p>";
//            echo "<div class='publi-gestion-organizador'>";
//            echo '<img class="publi-gestion-img" src="../img/' . $arrayFoo[$i]->getNombrePublicidad() . '" alt="' . $arrayFoo[$i]->getAltPublicidad() . '">';
//            echo "<div>";
//            echo "<form action='../config/erase_ad.php' method='post'>";
//            echo "<input type='hidden' name='id_publicidad' value='" . $arrayFoo[$i]->getIdPublicidad() . "'>";
//            echo "<input class='boton-eliminar' type='submit' value='Eliminar'>";
//            echo "</form>";
//            echo "<button class='boton-modificar' type='button' onclick='editarPublicidad(" . $arrayFoo[$i]->getIdPublicidad() . ")'>Modificar</button>";
//            echo "</div>";
//            echo "</div>";
//            // formulario oculto edicion
//            echo "<form class='form-publi-gestion form-publi-gestion-edicion' action='../config/update_ad.php' method='post'>";
//            echo "<input type='hidden' name='id_publicidad' value='" . $arrayFoo[$i]->getIdPublicidad() . "'>";
//            echo "<div>";
//            echo "<span>Alt anuncio:  </span>";
//            echo "<input type='text' name='alt_publicidad' value='" . $arrayFoo[$i]->getAltPublicidad() . "'>";
//            echo "</div>";
//            echo "<input type='file' name='nombre_publicidad' accept='image/*' required>";
//            echo "<input type='submit' value='Modificar'>";
//            echo "</form>";
//            // fin - formulario oculto edicion
//            echo "<hr>";
//            echo "</div>";
        }
        echo '</div>';
        echo "<h2>Añadir nueva seccion</h2>";
        echo "<form class='form-seccion-gestion' action='../config/add_section.php' method='post'>";
        echo "<div>";
        echo "<span>Nombre sección:  </span>";
        echo "<input type='text' name='nombre_seccion' required>";
        echo "</div>";
        echo "<input class='confirmar-enviar' type='submit' value='Enviar'>";
        echo "</form>";
        echo "<h2>Añadir nueva subseccion</h2>";
        echo "<form class='form-seccion-gestion' action='../config/add_subsection.php' method='post'>";
        echo "<div>";
        echo "<span>Nombre subsección:  </span>";
        echo "<input type='text' name='nombre_subseccion' required>";
        echo "<span>id sección:  </span>";
        echo "<input type='number' name='id_seccion' required>";
        echo "</div>";
        echo "<input class='confirmar-enviar' type='submit' value='Enviar'>";
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