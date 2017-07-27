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
<body>
<?php
include_once("../content/header.php");
?>
<section id="main">
    <?php
        include_once("../controller/news_controller.php");
        $newsController = new NewsController();
        $newsController->organizadorNoticias();
    ?>
</section>
<?php
include_once("../content/footer.php");
?>
<script src="../js/comentarios.js"></script>
<script src="../js/menu.js"></script>
<script src="../js/adds.js"></script>
</body>
</html>