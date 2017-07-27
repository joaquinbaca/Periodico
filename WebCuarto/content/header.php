<header>
    <div id="contenedor-id">
        <div id="contenedor-logo">
            <?php
            if (file_exists("img/logo.png")) {
                echo '<img src="img/logo.png" alt="Cuarto"> </div>';
            } else {
                echo '<img src="../img/logo.png" alt="Cuarto"> </div>';
            }
            ?>
            <div id="contenedor-login">
                <?php
                if (!isset($_SESSION['id'])) {
                    echo '<form action="'; if (file_exists("config/checklogin.php")) echo "config/checklogin.php"; else echo "../config/checklogin.php"; echo '" method="post">';
                    echo '<input type="text" placeholder="&#128272; Correo" name="mail" required>';
                    echo '<input type="password" placeholder="&#128272; Contraseña" name="password" required>';
                    echo '<input type="submit" value="Entrar">';
                    echo '<a href="'; if (file_exists("view/add_user.php")) echo "view/add_user.php"; else echo "add_user.php"; echo '">Regístrate</a>';
                    echo '</form>';
                } else {
                    echo "<h4>Hola, " . $_SESSION['username'] . "</h4>";
                    if($_SESSION['user_rol'] == 'administrador') {
                        echo "<div id='menu-gestion-contenidos'>";
                        echo '<ul class="nav-gestion">';
                        echo '<li><a href="">Gestión de contenidos</a>';
                        echo '<ul>';
                        echo '<li><a href="'; if (isset($_GET['id_noticia'])) echo "comments_view.php?id_noticia=" . $_GET['id_noticia'] . ""; echo '">Gestor de comentarios</a></li>';
                        echo '<li><a href="../view/gestor_noticias.php">Gestor de noticias</a></li>';
                        if (isset($_GET['id_noticia']))
                            $rutaPublicidad = "ads_view.php?id_noticia=" . $_GET['id_noticia'] . "";
                        else
                            $rutaPublicidad = "view/ads_view.php";
                        echo '<li><a href="' . $rutaPublicidad . '">Gestor de publicidad</a></li>';
                        if (file_exists("sections_view.php"))
                            $rutaSecciones = "sections_view.php";
                        else
                            $rutaSecciones = "view/sections_view.php";
                        echo '<li><a href="' . $rutaSecciones . '">Gestor de secciones y subsecciones</a></li>';
                        if (file_exists("sections_view.php"))
                            $rutaOrganizador = "organizer_view.php";
                        else
                            $rutaOrganizador = "view/organizer_view.php";
                        echo '<li><a href="' . $rutaOrganizador . '">Organizador de la página de inicio</a></li>';
                        echo '</ul>';
                        echo '</li>';
                        echo '</ul>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
        <div id="contenedor-nav">
            <nav id="menu-nav">
                <ul>
                    <div class="flexbox">
                        <li class="disnone"><a id="expand-button" href="javascript:void(0);" onclick="expandMenu()">&#9776;</a></li>
                        <li><a href="">Principal</a>
                        </li>
                        <li><a href="">Fútbol</a>
                        </li>
                        <li><a href="">Baloncesto</a>
                        </li>
                        <li><a href="">Tenis</a>
                        </li>
                        <li><a href="">Fórmula 1</a>
                        </li>
                    </div>
                    <div>
                        <li>
                            <form>
                                <input id="cuadro-busqueda" type="text" placeholder="Busca noticia..." onkeyup="search(this.value)">
                                <div id="resultado-busqueda"></div>
                            </form>
                        </li>
                    </div>
                </ul>
            </nav>
        </div>
    </div>
</header>