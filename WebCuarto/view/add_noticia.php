<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuarto Deportes</title>
</head>
<body onload="timerPic2()">
<div id="contenido-principal">
    <?php
    include_once("../content/share_content.php");
    include_once("../content/social_buttons.php");
    include_once("../content/header.php");
    ?>
    <section id="main">
        <?php
        if (isset($_SESSION['id'])) {
            $idNoticia = $_POST['id_noticia'];
            echo "<h1>Añadir nueva noticia</h1>";
            echo "<div id='noticias_add'>";
            echo '<form action="../config/add_noticia.php" method="post">';
            echo '<input name="id_noticia" type="hidden" value="' . $idNoticia . '">';
            echo "<h3>Titulo de la noticia</h3>";
            echo "<textarea   name='titulo_noticia' required></textarea>";
            echo "<h3>Subtitulo de la noticia</h3>";
            echo "<textarea name='subtitulo_noticia' required></textarea>";
            echo "<h3>Entradilla de la noticia</h3>";
            echo "<textarea cols=\"30\" rows=\"10\" name='entradilla_noticia' required></textarea>";
            echo "<h3>Contenido de la noticia</h3>";
            echo "<textarea cols=\"150\" rows=\"30\" name='contenido_noticia' required></textarea>";
            echo "<h3>URL de la imgen de la noticia</h3>";
            echo "<input type='file' name='imagen_noticia' required>";
            echo "<h3>Autor de la imagen de la noticia</h3>";
            echo "<textarea name='autor_imagen' required></textarea>";
            echo "<input type='submit' value='Enviar'>";
            echo "</form>";
            echo "</div>";
        }
        ?>
    </section>
    <?php
    include_once("../content/footer.php");
    ?>
</div>
<script src="../js/comentarios.js"></script>
<script src="../js/menu.js"></script>
<script src="../js/adds.js"></script>
</body>
</html>