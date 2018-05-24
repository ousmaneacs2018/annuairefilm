<?php 

require 'app/model/ModeleFilm.php';
require_once './vendor/autoload.php';



  $loader = new Twig_Loader_Filesystem('app/view');
  $twig = new Twig_Environment($loader, array(
      'cache' => false,
  ));

try {
  $film = getFilm(100);

  $template = $twig->loadTemplate('/Index/index.html.twig');
  echo $template->render(array(
    'film' => $film      
));
}

catch (Exception $e) {
    $msgErreur = $e->getMessage();/*
    $template = $twig->loadTemplate('/404/404.html.twig');
    echo $template->render(array(
      'film' => $film      
    ));*/
}

?> 