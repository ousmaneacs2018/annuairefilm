<?php



// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
  $bdd = new PDO('mysql:host=localhost;dbname=annuaire;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  return $bdd;
}

// Renvoie la liste de tous les films, avec leur genre (TEST)
function getFilm($id_film) {
  $bdd = getBdd();
  //$film = $bdd->prepare('SELECT * FROM `film` AS f INNER JOIN `realisateur` AS r INNER JOIN `film_has_realisateur` AS h ON h.id_film = f.id_film AND h.id_realisateur = r.id_realisateur');
  $sql = $bdd->prepare('select * from film where id_film = :id_film');
  $sql->bindValue(':id_film', $id_film, PDO::PARAM_INT);
    
  if ($sql->execute())
    return $sql->fetch(PDO::FETCH_ASSOC);
  else
    throw new Exception ("Aucun film ne correspond à votre requete '$id_film'");
}

?>