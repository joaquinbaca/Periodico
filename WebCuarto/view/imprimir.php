<?php
    echo '<link rel="stylesheet" href="../css/style.css">';
    require_once("../controller/news_controller.php");
    $newsController = new NewsController();
    $newsController->ImprimirNoticiaPorId($_GET['id_noticia']);