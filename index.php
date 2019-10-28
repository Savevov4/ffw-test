<?php
    require_once 'vendor/autoload.php';

    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem('src');
    $twig = new Twig_Environment($loader);

    $src = $twig->loadTemplate('index.html');
    $title = "FFW Front-end project test";
    echo $src->render(array(
        'title' => $title
    ));
?>