<!-- header -->
<?php
require_once 'templates/header.php';
require_once 'lib/recipe.php';

$recipes = getRecipesById($pdo);
?>

  <!-- section main -->
  <div class="col-lg-6">
    <h1 class="display-5 fw-bold lh-1 mb-3">Liste des recettes</h1>
  </div>
  <!-- code php pour afficher les recettes -->
  <div class="row">

  <?php
    //on crée une boucle pour parcourir notre tableau
    //on peut remplacer <?php echo par <?=
    //Dans notre tableau on remplace les valeurs en dur par les chemin vers notre tableau
  foreach ($recipes as $key => $recipe) { 
    include 'templates/recipe_partial.php';
  }  ?>

  </div>
  <!-- section footer -->
  <?php
  require_once "templates/footer.php";
  ?>

