<?php

if (file_exists("model/news_model.php")) {
	require_once( "model/news_model.php" );
} else {
	require_once("../model/news_model.php");
}

class NewsController {

	private $news;

	public
	function __construct() {
		$this->news = new ManageNews();
	}

	public
	function noticiaPrincipal() {
		$foo = $this->news->getNoticiaPrincipal();
		echo '<article id="articulo-noticia-p" class="cabecera-articulo">';
		echo "<img src='img/" . $foo->getImagenNoticia() . "'/>";
		echo "<p>" . $foo->getSubtituloNoticia() . "</p>";
		echo "<a class='titulo' href='view/news_view.php?id_noticia=" . $foo->getIdNoticia() . "' target='_blank'>" . $foo->getTituloNoticia() . "</a>";
		echo "</article>";
	}

	public
	function noticiaPorId($id_noticia) {
		$foo = $this->news->getNoticiaPorId($id_noticia);
		echo '<div id="noticia-p-titulo">';
		echo '<h1>' . $foo->getTituloNoticia() . '</h1>';
        if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'administrador') {
            echo "<a id='boton-admin' href='news_admin_view.php?id_noticia=" . $_GET['id_noticia'] . "'>Modificar</a>";
        }
		echo '</div>';
		echo '<div id="contenedor-columnas-noticia">';
		$this->aside($foo);
		echo '<article class="columna-principal">';
		echo '<div class="cabecera-articulo">';
		echo '<h2>' . $foo->getSubtituloNoticia() . '</h2>';
		echo '<hr>';
		echo '<p>' . $foo->getEntradillaNoticia() . '</p>';
		echo '</div>';
		echo '<figure>';
		echo "<img id='imagen-noticia' src='../img/" . $foo->getImagenNoticia() . "'/>";
		echo '<figcaption class="pieFoto">';
		// echo $foo->getDescripcionImagen();
		echo '<span class="creditoFoto">';
		echo ' - Foto por ' . $foo->getAutorImagen() . '';
		echo '</span>';
		echo '</figcaption>';
		echo '</figure>';
		echo '<div class="parrafo-articulo">';
		echo $foo->getContenidoNoticia();
		echo '</div>';
		echo '</article>';
		echo '</div>';
	}

    public
    function noticiaPorIdAdmin($id_noticia) {
        $foo = $this->news->getNoticiaPorId($id_noticia);
        echo '<div id="noticia-p-titulo">';
        echo "<form action='../config/update_titulo.php' method='post'>";
        echo "<input type='hidden' name='id_noticia' value='" . $_GET['id_noticia'] . "'>";
        echo "<textarea class='titulo-admin' type='text' name='titulo_noticia'>" . $foo->getTituloNoticia() . "</textarea>";
        echo "<input class='boton-admin' type='submit' value='Modificar'>";
        echo "</form>";
        echo '</div>';
        echo '<div id="contenedor-columnas-noticia">';
        $this->aside($foo);
        echo '<article class="columna-principal">';
        echo '<div class="cabecera-articulo">';
        echo "<form action='../config/update_subtitulo.php' method='post'>";
        echo "<input type='hidden' name='id_noticia' value='" . $_GET['id_noticia'] . "'>";
        echo "<textarea class='subtitulo-admin' type='text' name='subtitulo_noticia'>" . $foo->getSubtituloNoticia() . "</textarea>";
        echo "<input class='boton-admin' type='submit' value='Modificar'>";
        echo "</form>";
        echo '<hr>';
        echo "<form action='../config/update_entradilla.php' method='post'>";
        echo "<input type='hidden' name='id_noticia' value='" . $_GET['id_noticia'] . "'>";
        echo "<textarea class='entradilla-admin' type='text' name='entradilla_noticia'>" . $foo->getEntradillaNoticia() . "</textarea>";
        echo "<input class='boton-admin' type='submit' value='Modificar'>";
        echo "</form>";
        echo '</div>';
        echo '<figure>';
        echo "<img id='imagen-noticia' src='../img/" . $foo->getImagenNoticia() . "'/>";
        echo '<figcaption class="pieFoto">';
        // echo $foo->getDescripcionImagen();
        echo '<span class="creditoFoto">';
        echo ' - Foto por ' . $foo->getAutorImagen() . '';
        echo '</span>';
        echo '</figcaption>';
        echo "<form action='../config/update_imagen.php' method='post'>";
        echo "<input type='hidden' name='id_noticia' value='" . $_GET['id_noticia'] . "'>";
        echo "<input type='file' accept='image/*' name='imagen_noticia'>";
        echo "<input class='boton-admin' type='submit' value='Modificar'>";
        echo "</form>";
        echo '</figure>';
        echo '<div class="parrafo-articulo">';
        echo "<form action='../config/update_contenido.php' method='post'>";
        echo "<input type='hidden' name='id_noticia' value='" . $_GET['id_noticia'] . "'>";
        echo "<textarea class='contenido-admin' type='text' name='contenido_noticia'>" . $foo->getContenidoNoticia() . "</textarea>";
        echo "<input class='boton-admin' type='submit' value='Modificar'>";
        echo "</form>";
        echo '</div>';
        echo '</article>';
        echo '</div>';
    }

	public 
	function aside($noticia) {
		echo '<aside class="columna-auxiliar">';
		echo '<div class="autor-fecha-hora">';
		echo '<address class="autor" itemprop="author">';
		echo $this->news->getNombreAutor($noticia->getIdRedactor());
		echo '</adress>';
		echo '<br>';
		echo '<time class="fecha-hora" datetime="' . $noticia->getFechaHoraNoticia() . '" itemprop="dateModified">';
		$date = strtotime($noticia->getFechaHoraNoticia());
		$dayTime = getdate($date);
		echo $dayTime['mday'] . "/" . $dayTime['mon'] . "/" . $dayTime['year'] . " <span> - " . $dayTime['hours'] . ":" . $dayTime['minutes'];
		echo '</time>';
        $arraySeccionSubseccion = $this->news->getSeccionSubseccionNoticia($noticia->getIdNoticia());
        $nombreSeccion = $arraySeccionSubseccion[0];
        $nombreSubseccion = $arraySeccionSubseccion[1];
		echo '<div class="seccion">';
		echo 'Sección: ' . $nombreSeccion . '';
		echo '</div>';
        echo '<div class="seccion">';
        echo 'Subsección: ' . $nombreSubseccion . '';
        echo '</div>';
		echo '</div>';
		echo '<div class="noticias-destacadas">';
		echo '<h4>Noticias destacadas</h4>';
		echo '<div>';
		$foo = $this->news->getNoticiasDestacadas($noticia);
		echo "<img src='../img/" . $foo[0]->getImagenNoticia() . "'/>";
		echo '<a class="titulo" href="#~" target="_blank">' . $foo[0]->getTituloNoticia() . '</a>';
		echo '</div>';
		echo '<div>';
		echo "<img src='../img/" . $foo[1]->getImagenNoticia() . "'/>";
		echo '<a class="titulo" href="#~" target="_blank">' . $foo[1]->getTituloNoticia() . '</a>';
		echo '</div>';
		echo '<div>';
		echo "<img src='../img/" . $foo[2]->getImagenNoticia() . "'/>";
		echo '<a class="titulo" href="#~" target="_blank">' . $foo[2]->getTituloNoticia() . '</a>';
		echo '</div>';
		include_once("../content/ads.php");    // inclusion de anuncios
		echo '</div>';
        include_once("../content/galeria.php");
		echo '</aside>';
	}
	
	public
	function noticiasGeneral() {
		
		echo "<div id='contenedor-columnas'>";
		$arrayFoo = $this->news->getNoticiasGeneral();
		echo "<div id='columna1'>";
		$i = 0;
		while ($i < 3) {
			echo '<article class="cabecera-articulo">';
			echo "<img src='img/" . $arrayFoo[$i]->getImagenNoticia() . "'/>";
			echo "<p>" . $arrayFoo[$i]->getSubtituloNoticia() . "</p>";
			echo "<a class='titulo' href='view/news_view.php?id_noticia=" . $arrayFoo[$i]->getIdNoticia() . "' target='_blank'>" . $arrayFoo[$i]->getTituloNoticia() . "</a>";
			echo "</article>";
			$i++;
		}
		echo "</div>";
		echo "<div id='columna2'>";
		while ($i < 6) {
			echo '<article class="cabecera-articulo">';
			echo "<img src='img/" . $arrayFoo[$i]->getImagenNoticia() . "'/>";
			echo "<p>" . $arrayFoo[$i]->getSubtituloNoticia() . "</p>";
			echo "<a class='titulo' href='view/news_view.php?id_noticia=" . $arrayFoo[$i]->getIdNoticia() . "' target='_blank'>" . $arrayFoo[$i]->getTituloNoticia() . "</a>";
			echo "</article>";
			$i++;
		}
		echo "</div>";
		echo "<div id='columna3'>";
		while ($i < 9) {
			echo '<article class="cabecera-articulo">';
			echo "<img src='img/" . $arrayFoo[$i]->getImagenNoticia() . "'/>";
			echo "<p>" . $arrayFoo[$i]->getSubtituloNoticia() . "</p>";
			echo "<a class='titulo' href='view/news_view.php?id_noticia=" . $arrayFoo[$i]->getIdNoticia() . "' target='_blank'>" . $arrayFoo[$i]->getTituloNoticia() . "</a>";
			echo "</article>";
			$i++;
		}
		echo "</div>";
		echo "</div>";
	}

    public
    function noticiasRelacionadas() {
	    $rnd = rand(1, $this->news->getNumeroNoticias());
        $noticia = $this->news->getNoticiaPorId($rnd);
        echo '<div class="noticias-destacadas">';
        echo '<h4>Noticias destacadas</h4>';
        echo '<div>';       // noticia 1
        $foo = $this->news->getNoticiasDestacadas($noticia);
        echo "<img src='img/" . $foo[0]->getImagenNoticia() . "'/>";
        echo '<a class="titulo" href="#~" target="_blank">' . $foo[0]->getTituloNoticia() . '</a>';
        echo '</div>';
        echo '<div>';       // noticia 2
        echo "<img src='img/" . $foo[1]->getImagenNoticia() . "'/>";
        echo '<a class="titulo" href="#~" target="_blank">' . $foo[1]->getTituloNoticia() . '</a>';
        echo '</div>';
        echo '<div>';       // noticia 3
        echo "<img src='img/" . $foo[2]->getImagenNoticia() . "'/>";
        echo '<a class="titulo" href="#~" target="_blank">' . $foo[2]->getTituloNoticia() . '</a>';
        echo '</div>';
        echo '</div>';
    }

    public function publicidad() {
        echo '<div id="publi-1">';
        echo '<img src="img/publi.jpg"/>';
        echo '</div>';
    }

    public
    function ImprimirNoticiaPorId($id_noticia) {
        echo '<div id="imagen-logo-imprimir">';
        echo '<img src="../img/logo.png"/>';
        echo '</div>';
        $foo = $this->news->getNoticiaPorId($id_noticia);
        echo '<div id="noticia-p-titulo-imprimir">';
        echo '<h1>' . $foo->getTituloNoticia() . '</h1>';
        echo '</div>';

        echo '<article class="columna-principal-imprimir">';
        echo '<div class="cabecera-articulo-imprimir">';
        echo '<h2>' . $foo->getSubtituloNoticia() . '</h2>';
        echo '<hr>';
        echo '<p>' . $foo->getEntradillaNoticia() . '</p>';
        echo '</div>';
        echo '<figure>';
        echo "<img id='imagen-noticia-imprimir' src='../img/" . $foo->getImagenNoticia() . "'/>";
        echo '<figcaption class="pieFoto">';
        // echo $foo->getDescripcionImagen();
        echo '<span class="creditoFoto">';
        echo ' - Foto por ' . $foo->getAutorImagen() . '';
        echo '</span>';
        echo '</figcaption>';
        echo '</figure>';
        echo '<div class="parrafo-articulo-imprimir">';
        echo $foo->getContenidoNoticia();
        echo '</div>';
        echo '</article>';
        echo '</div>';
    }

    public function organizadorNoticias()
    {
        echo "<div id='contenedor-organizador'>";
        $arrayFoo = $this->news->getOrganizadorNoticias();

        for ($i = 0; $i < count($arrayFoo); $i++) {
            echo "<div class='organizador-noticia-x'>";
            echo "<h3>" . $arrayFoo[$i]->getTituloNoticia() . "</h3>";
            echo "<h4>" . $arrayFoo[$i]->getSubtituloNoticia() . "</h4>";
            echo "<img src='../img/" . $arrayFoo[$i]->getImagenNoticia() . "'/>";
            echo "<form class='form-organizador' action='../config/update_organizer.php' method='post'>";
            echo "<input type='hidden' name='id_noticia' value='" . $arrayFoo[$i]->getIdNoticia() . "'>";
            echo "<select class='organizador-noticia-select' name='position'>";
            $posicionActual = $arrayFoo[$i]->getPosicionNoticia();
            echo "<option value='-1'"; if ($posicionActual == -1) echo " selected='selected'"; echo ">No aparece</option>";
            echo "<option value='0'"; if ($posicionActual == 0) echo " selected='selected'"; echo ">Destacada</option>";
            echo "<option value='1'"; if ($posicionActual == 1) echo " selected='selected'"; echo ">1</option>";
            echo "<option value='2'"; if ($posicionActual == 2) echo " selected='selected'"; echo ">2</option>";
            echo "<option value='3'"; if ($posicionActual == 3) echo " selected='selected'"; echo ">3</option>";
            echo "<option value='4'"; if ($posicionActual == 4) echo " selected='selected'"; echo ">4</option>";
            echo "<option value='5'"; if ($posicionActual == 5) echo " selected='selected'"; echo ">5</option>";
            echo "<option value='6'"; if ($posicionActual == 6) echo " selected='selected'"; echo ">6</option>";
            echo "<option value='7'"; if ($posicionActual == 7) echo " selected='selected'"; echo ">7</option>";
            echo "<option value='8'"; if ($posicionActual == 8) echo " selected='selected'"; echo ">8</option>";
            echo "<option value='9'"; if ($posicionActual == 9) echo " selected='selected'"; echo ">9</option>";
            echo "<input type='submit' value='Modificar'>";
            echo "</form>";
            echo "</div>";
            echo "<hr>";
        }
    }

    public function mostrarTodasLasNoticias(){
        $arrayFoo = $this->news->getNoticiasGeneral();
        $NumeroN = count($arrayFoo);
        echo "<div id='TodasLasNoticiasGenerales'>";

        echo '<form class="nueva-noticia" action="../view/add_noticia.php" method="post">';
        echo '<input name="id_noticia" type="hidden" value="' . $NumeroN . '">';
        echo "<input type='submit' value='Nueva'>";
        echo "</form>";

        $arrayFoo = $this->news->getOrganizadorNoticias();
        $i = 0;
        $NumeroNoticias = count($arrayFoo);
        while ($i < $NumeroNoticias) {
            echo '<article class="gestionNoticia">';
            echo "<img src='../img/" . $arrayFoo[$i]->getImagenNoticia() . "'/>";


            echo '<form action="../view/gestor_noticias_individual.php" method="post">';
            echo '<input name="id_noticia" type="hidden" value="' . $arrayFoo[$i]->getIdNoticia() . '">';
            echo '<input name="titulo_noticia" type="hidden" value="' . $arrayFoo[$i]->getTituloNoticia() . '">';
            echo '<input name="subtitulo_noticia" type="hidden" value="' . $arrayFoo[$i]->getSubtituloNoticia() . '">';
            echo '<input name="entradilla_noticia" type="hidden" value="' . $arrayFoo[$i]->getEntradillaNoticia() . '">';
            echo "<div class='disnone'>";
            echo '<input name="contenido_noticia" type="hidden" value="' . $arrayFoo[$i]->getContenidoNoticia() . '">';
            echo "</div>";
            echo '<input name="fecha_noticia" type="hidden" value="' . $arrayFoo[$i]->getFechaHoraNoticia() . '">';
            echo '<input name="imagen_noticia" type="hidden" value="' . $arrayFoo[$i]->getImagenNoticia() . '">';
            echo '<input name="autor_imagen" type="hidden" value="' . $arrayFoo[$i]->getAutorImagen() . '">';
            echo "<input type='submit' value='Modificar'>";
            echo "</form>";
            echo '<form action="../config/erase_noticia.php" method="post">';
            echo '<input name="id_noticia" type="hidden" value="' . $arrayFoo[$i]->getIdNoticia() . '">';
            echo '<input class="boton-eliminar" type="submit" value="Eliminar">';
            echo '</form>';

            echo "<p>" . $arrayFoo[$i]->getSubtituloNoticia() . "</p>";
            echo "<a class='titulo'>" . $arrayFoo[$i]->getTituloNoticia() . "</a>";
            echo "</article>";
            $i++;
        }
        echo "</div>";


    }

    public function eliminarNoticiaPorId($id_noticia)
    {
        $this->news->unsetNoticia($id_noticia);
    }

    public function nuevaNoticia($tituloNoticia, $subtituloNoticia,$entradillaNoticia ,$contenidoNoticia, $imagenNoticia ,$autorImagen)
    {
        $this->news->setNuevaNoticia($tituloNoticia, $subtituloNoticia,$entradillaNoticia ,$contenidoNoticia, $imagenNoticia ,$autorImagen);
    }

    public function actualizarNoticiaPorId($id_noticia, $tituloNoticia, $subtituloNoticia,$entradillaNoticia ,$contenidoNoticia,$fechaNoticia, $imagenNoticia ,$autorImagen)
    {
        $this->news->updateNoticia($id_noticia, $tituloNoticia,$subtituloNoticia ,$entradillaNoticia ,$contenidoNoticia,$fechaNoticia, $imagenNoticia ,$autorImagen);
    }
}







