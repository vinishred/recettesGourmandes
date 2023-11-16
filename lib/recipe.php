<?php

function getRecipeById (PDO $pdo, int $id) {
  //on écrit notre requete avec une variable intermédiaire qui commence par :
// pour éviter l'injection sql dans l'url
$query = $pdo->prepare("SELECT * FROM recipes WHERE id = :idSecurise");
//on relie dans notre requete cette variable à notre $id comme ça il doit être juste un chiffre
$query->bindParam('idSecurise', $id, PDO::PARAM_INT);
//on appuye sur le bouton exécuter
$query->execute();
//on stock le résultat de notre requête
return $query->fetch();
//on gère le cas où il n'y a pas d'image pour notre recette
}

//on crée une fonction pour récupérer toutes nos recettes par id descendant (comme ça on a les dernières en premier)
//on met un deuxième paramêtre qui est la limite du nombre de recette et on lui donne une valeur nulle par défaut comme ça si on veut pas de limite on est pas obligé de préciser ce paramêtre
function getRecipesById (PDO $pdo, int $limit = null) {
  $sql = 'SELECT * FROM recipes ORDER BY id DESC';
//si le paramêtre $limit n'est pas nul on rajoute une limite à la requête sql
  if($limit) {
    $sql .= ' LIMIT :limit';
  }
//on prépare la requête
  $query = $pdo->prepare($sql);
//on rajoute un bindparam pour sécuriser la requête
  if($limit) {
  $query->bindParam(':limit', $limit, PDO::PARAM_INT);
  }
  $query->execute();
  return $query->fetchAll();
}

function getRecipeImage(string|null $image) {
  if($image == null) {
    return _ASSETS_IMG_PATH_.'recettesYolande.jpg';
  } else {
    return _RECIPES_IMG_PATH_.$image;
  }
}

// on crée une fonction qui va prendre tous les param$etres de notre formulaires et les rentrer dans notre base de donées recipes
// Il faut utilisez les backticks (``) pour délimiter les noms de table et de colonnes dans MySQL/MariaDB.
function saveRecipe(PDO $pdo, int $category, string $title, string $description, string $ingredients, string $instructions, string|null $image) {
  $sql = "INSERT INTO `recipes` (`id`, `category_id`, `title`, `description`, `ingredients`, `instructions`, `image`) VALUES (NULL, :category_id, :title, :description, :ingredients, :instructions, :image);";
  $query = $pdo->prepare($sql);
  $query->bindParam(':category_id', $category, PDO::PARAM_INT);
  $query->bindParam(':title', $title, PDO::PARAM_STR);
  $query->bindParam(':description', $description, PDO::PARAM_STR);
  $query->bindParam(':ingredients', $ingredients, PDO::PARAM_STR);
  $query->bindParam(':instructions', $instructions, PDO::PARAM_STR);
  $query->bindParam(':image', $image, PDO::PARAM_STR);
  return $query->execute();
}