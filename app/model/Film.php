<?php

class Film extends Model {
   public $id_film, $fil_titre, $fil_annee, $fil_affiche;

   public static function getFromSlug( $slug ) {
      $db = Database::getInstance();
      $sql = "SELECT * FROM film WHERE slug = :slug";
      $stmt = $db->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->bindValue(':slug', $slug, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
   }

   public static function getList() {
      $db = Database::getInstance();
      $sql = "SELECT * FROM film
              order by rand()  
              limit 3";
      $stmt = $db->query($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      return $stmt->fetchAll();

   }

}
