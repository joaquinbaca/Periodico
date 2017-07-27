<?php

if (file_exists("config/conexion.php")) {
	require_once( "config/conexion.php" );
} else {
	require_once("../config/conexion.php");
}

class ManageNews {
	
	private $connection;
	
	public function __construct() {
		$this->connection = connectDB();
	}
	
	public function getNoticiaPrincipal() {
		
		$sql = "SELECT * FROM noticias WHERE posicion_noticia='0' ORDER BY fecha_hora_noticia DESC";
		$result = $this->connection->query($sql);
		
		if ($result->num_rows > 0) {
			$result = $result->fetch_assoc();
            if (file_exists("objects/news_object.php")) {
                require_once( "objects/news_object.php" );
            } else {
                require_once("../objects/news_object.php");
            }
			$foo = new News();
			$foo->setIdNoticia($result["id_noticia"]);
			$foo->setIdRedactor($result["id_redactor"]);
			$foo->setTituloNoticia($result["titulo_noticia"]);
			$foo->setSubtituloNoticia($result["subtitulo_noticia"]);
			$foo->setEntradillaNoticia($result["entradilla_noticia"]);
			$foo->setContenidoNoticia($result["contenido_noticia"]);
			$foo->setFechaHoraNoticia($result["fecha_hora_noticia"]);
			$foo->setImagenNoticia($result["imagen_noticia"]);
			$foo->setAutorImagen($result["autor_imagen"]);
			$foo->setPosicionNoticia($result["posicion_noticia"]);
			
			return $foo;
		} else {
			echo "No se encuentra ninguna noticia principal.";
		}
	}

	public function getNoticiaPorId($idNoticia) {
		$sql = "SELECT * FROM noticias WHERE id_noticia = '$idNoticia'";
		$result = $this->connection->query($sql);
		
		if ($result->num_rows > 0) {
			$result = $result->fetch_assoc();
			if (file_exists("objects/news_object.php")) {
				require_once( "objects/news_object.php" );
			} else {
				require_once("../objects/news_object.php");
			}
			$foo = new News();
			$foo->setIdNoticia($result["id_noticia"]);
			$foo->setIdRedactor($result["id_redactor"]);
			$foo->setTituloNoticia($result["titulo_noticia"]);
			$foo->setSubtituloNoticia($result["subtitulo_noticia"]);
			$foo->setEntradillaNoticia($result["entradilla_noticia"]);
			$foo->setContenidoNoticia($result["contenido_noticia"]);
			$foo->setFechaHoraNoticia($result["fecha_hora_noticia"]);
			$foo->setImagenNoticia($result["imagen_noticia"]);
			$foo->setAutorImagen($result["autor_imagen"]);
			$foo->setPosicionNoticia($result["posicion_noticia"]);
			
			return $foo;
		} else {
			echo "No se encuentra la noticia.";
		}
	}
	
	public function getNoticiasGeneral() {
		
		$sql = "SELECT * FROM noticias WHERE posicion_noticia BETWEEN '1' AND '9' ORDER BY posicion_noticia ASC";
		$result = $this->connection->query($sql);
		
		if ($result->num_rows > 0) {
		    if (file_exists("objects/news_object.php"))
                require_once("objects/news_object.php");
		    else
		        require_once("../objects/news_object.php");
			$arrayFoo = array();
			for ($i = 0; $i < 9; $i++) {
				$row = $result->fetch_assoc();
				$foo = new News();
				$foo->setIdNoticia($row["id_noticia"]);
				$foo->setIdRedactor($row["id_redactor"]);
				$foo->setTituloNoticia($row["titulo_noticia"]);
				$foo->setSubtituloNoticia($row["subtitulo_noticia"]);
				$foo->setEntradillaNoticia($row["entradilla_noticia"]);
				$foo->setContenidoNoticia($row["contenido_noticia"]);
				$foo->setFechaHoraNoticia($row["fecha_hora_noticia"]);
				$foo->setImagenNoticia($row["imagen_noticia"]);
				$foo->setAutorImagen($row["autor_imagen"]);
				$foo->setPosicionNoticia($row["posicion_noticia"]);
				array_push($arrayFoo, $foo);
			}
			
			return $arrayFoo;
		} else {
			echo "No se encuentra ninguna noticia.";
		}
		
	}

	public function getNombreAutor($id_autor) {
		$sql = "SELECT nombre_usuario FROM usuarios WHERE id_usuario = '$id_autor'";
		$result = $this->connection->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['nombre_usuario'];
		} else {
			"No se encuentra al autor de la noticia.";
		}
	}

	public function getNoticiasDestacadas($noticia)
    {
        $id = $noticia->getIdNoticia();
        $sql = "SELECT titulo_noticia, imagen_noticia FROM noticias WHERE id_noticia != '$id' ORDER BY fecha_hora_noticia DESC";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            $arrayFoo = array();
            for ($i = 0; $i < 3; $i++) {
                $row = $result->fetch_assoc();
                $foo = new News();
                $foo->setTituloNoticia($row["titulo_noticia"]);
                $foo->setImagenNoticia($row["imagen_noticia"]);
                array_push($arrayFoo, $foo);
            }

            return $arrayFoo;
        }
    }

    public function getNumeroNoticias() {
	    $sql = "SELECT id_noticia FROM noticias";
	    $result = $this->connection->query($sql);

	    return $result->num_rows;
    }

    public function getOrganizadorNoticias()
    {
        $sql = "SELECT * FROM noticias ORDER BY posicion_noticia ASC, fecha_hora_noticia DESC";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            require_once("../objects/news_object.php");
            $arrayFoo = array();
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_assoc();
                $foo = new News();
                $foo->setIdNoticia($row["id_noticia"]);
                $foo->setIdRedactor($row["id_redactor"]);
                $foo->setTituloNoticia($row["titulo_noticia"]);
                $foo->setSubtituloNoticia($row["subtitulo_noticia"]);
                $foo->setEntradillaNoticia($row["entradilla_noticia"]);
                $foo->setContenidoNoticia($row["contenido_noticia"]);
                $foo->setFechaHoraNoticia($row["fecha_hora_noticia"]);
                $foo->setImagenNoticia($row["imagen_noticia"]);
                $foo->setAutorImagen($row["autor_imagen"]);
                $foo->setPosicionNoticia($row["posicion_noticia"]);
                array_push($arrayFoo, $foo);
            }

            return $arrayFoo;
        } else {
            echo "No se encuentra ninguna noticia.";
        }
    }

    public function updatePosicionNoticia($idNoticia, $nuevaPosicion)
    {
        $sql = "SELECT posicion_noticia FROM noticias WHERE id_noticia='$idNoticia'";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $posActual = $row['posicion_noticia'];
            // comprueba que no se va a colocar en la misma posicion que esta
            if ($posActual != $nuevaPosicion) {
                // comprueba si actualmente tiene alguna posicion asignada
                if ($posActual != -1) {
                    $sql = "SELECT id_noticia FROM noticias WHERE posicion_noticia='$nuevaPosicion' ORDER BY fecha_hora_noticia DESC";
                    $result = $this->connection->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $idAnteriorNoticia = $row['id_noticia'];
                        $sql = "UPDATE noticias SET posicion_noticia='$posActual' WHERE id_noticia='$idAnteriorNoticia'";
                        $this->connection->query($sql);
                    }
                    $sql = "UPDATE noticias SET posicion_noticia='$nuevaPosicion' WHERE id_noticia='$idNoticia'";
                    if (!($this->connection->query($sql) === TRUE)) {
                        echo "No se pudo actualizar la posicion.";
                    }
                }
            }
        } else {
            echo "No se encuentra la noticia que deseas colocar";
        }
    }

    public function setNuevaNoticia($tituloNoticia, $subtituloNoticia,$entradillaNoticia ,$contenidoNoticia, $imagenNoticia ,$autorImagen)
    {
        $sql = "INSERT INTO noticias (titulo_noticia, subtitulo_noticia, entradilla_noticia, contenido_noticia ,imagen_noticia,autor_imagen)
            VALUES ('$tituloNoticia', '$subtituloNoticia', '$entradillaNoticia', '$contenidoNoticia','$imagenNoticia','$autorImagen')";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo añadir la noticia.";
        }
    }

    public function unsetNoticia($id_noticia)
    {
        $sql = "DELETE FROM noticias WHERE id_noticia = '$id_noticia'";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo eliminar la noticia.";
        }
    }

    public function updateNoticia($id_noticia, $tituloNoticia ,$subtituloNoticia ,$entradillaNoticia ,$contenidoNoticia,$fechaNoticia, $imagenNoticia ,$autorImagen)
    {
        $sql = "UPDATE noticias SET titulo_noticia='$tituloNoticia' , subtitulo_noticia='$subtituloNoticia',entradilla_noticia='$entradillaNoticia', contenido_noticia='$contenidoNoticia' ,fecha_hora_noticia='$fechaNoticia', imagen_noticia='$imagenNoticia', autor_imagen='$autorImagen' WHERE id_noticia = '$id_noticia'";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo actualizar la noticia.";
        }
    }

    public function updateTituloNoticia($id_noticia, $tituloNoticia)
    {
        $sql = "UPDATE noticias SET titulo_noticia='$tituloNoticia' WHERE id_noticia = '$id_noticia'";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo actualizar la noticia.";
        }
    }

    public function updateSubtituloNoticia($id_noticia, $subtituloNoticia)
    {
        $sql = "UPDATE noticias SET subtitulo_noticia='$subtituloNoticia' WHERE id_noticia = '$id_noticia'";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo actualizar la noticia.";
        }
    }

    public function updateEntradillaNoticia($id_noticia, $entradillaNoticia)
    {
        $sql = "UPDATE noticias SET entradilla_noticia='$entradillaNoticia' WHERE id_noticia = '$id_noticia'";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo actualizar la noticia.";
        }
    }

    public function updateImagenNoticia($id_noticia, $imagenNoticia)
    {
        $sql = "UPDATE noticias SET imagen_noticia='$imagenNoticia' WHERE id_noticia = '$id_noticia'";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo actualizar la noticia.";
        }
    }

    public function updateContenidoNoticia($id_noticia, $contenidoNoticia)
    {
        $sql = "UPDATE noticias SET contenido_noticia='$contenidoNoticia' WHERE id_noticia = '$id_noticia'";

        if (!($this->connection->query($sql) === TRUE)) {
            echo "No se pudo actualizar la noticia.";
        }
    }

    public function getSeccionSubseccionNoticia($idNoticia)
    {
        $sql = "SELECT seccion_noticia FROM noticias WHERE id_noticia='$idNoticia'";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $numSubseccion = $row['seccion_noticia'];
            // la pos 0 del array sera la seccion y la 1 la subseccion
            $arrayFoo = array();
            $sql = "SELECT id_seccion, nombre_subseccion FROM subsecciones WHERE id_subseccion='$numSubseccion'";
            $result = $this->connection->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nombreSubseccion = $row['nombre_subseccion'];
                $numSeccion = $row['id_seccion'];

                $sql = "SELECT nombre_seccion FROM secciones WHERE id_seccion='$numSeccion'";
                $result = $this->connection->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $nombreSeccion = $row['nombre_seccion'];

                    array_push($arrayFoo, $nombreSeccion);
                    array_push($arrayFoo, $nombreSubseccion);

                    return $arrayFoo;
                } else {
                    echo "No se ha encontrado la seccion.";
                }
            } else {
                echo "No se ha encontrado la subseccion.";
            }
        } else {
            echo "No se ha encontrado la noticia.";
        }
    }

    public function buscarTitulo($entrada, $usuario) {

	    if ($usuario == 0)
            $sql = "SELECT * FROM noticias WHERE titulo_noticia LIKE '%$entrada%'";
	    else
            $sql = "SELECT * FROM noticias WHERE estado_noticia='publicada' AND titulo_noticia LIKE '%$entrada%'";

        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            if (file_exists("objects/news_object.php"))
                require_once("objects/news_object.php");
            else
                require_once("../objects/news_object.php");
            $arrayFoo = array();
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_assoc();
                $foo = new News();
                $foo->setIdNoticia($row["id_noticia"]);
                $foo->setTituloNoticia($row["titulo_noticia"]);
                array_push($arrayFoo, $foo);
            }

            return $arrayFoo;
        } else {
            return "error";
        }

    }
	
}


























