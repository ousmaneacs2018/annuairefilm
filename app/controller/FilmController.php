<?php

class FilmController extends Controller {
   public function display() {
      $slug = $this->route["params"]["slug"];
      $film = Film::getFromSlug($slug);
      
      require_once 'vendor/autoload.php';

        $loader = new Twig_Loader_Filesystem('app/view');
        $twig = new Twig_Environment($loader, array(
            'cache' => false
        ));

        $template = $twig->loadTemplate('/Film/display.html.twig');
        echo $template->render(array(
            'film'  => $film
        ));
   }
   
}