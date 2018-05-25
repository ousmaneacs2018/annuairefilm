<?php 

require 'app/model/ModeleFilm.php';
require_once './vendor/autoload.php';



  $loader = new Twig_Loader_Filesystem('app/view');
  $twig = new Twig_Environment($loader, array(
      'cache' => false,
  ));

try {
  $film = getFilm(12);

  $template = $twig->loadTemplate('/Index/index.html.twig');
  echo $template->render(array(
    'film' => $film      
));
}

catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require_once('/404/404.html.twig');
    $template = $twig->loadTemplate('/404/404.html.twig');
}

?> 