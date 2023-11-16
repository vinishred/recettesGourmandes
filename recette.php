  <!-- header -->
<?php
require_once 'templates/header.php';
require_once 'lib/recipe.php';
require_once 'lib/tools.php';

//on récupère notre id écrit dans notre URL et on le caste en int pour sécuriser
$id = (int)$_GET['id'];
// var_dump($id);
//on recupere notre recette grace à cette fonction qui est dans recipe.php
$recipe = getRecipeById($pdo, $id);

if ($recipe) { 
  // on met dans une variable la liste des ingredients avec un retour à la ligne pour chaque element
  $ingredients = linesToArray($recipe['ingredients']);
  $instructions = linesToArray($recipe['instructions']);
?>

<!-- section main -->
<div class="container">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="<?= getRecipeImage($recipe['image']); ?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?= $recipe['title']?></h1>
        <p class="lead"><?= $recipe['description']?></p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <h2>Ingrédients</h2>
        <ul class="list-group">
          <?php 
        foreach ($ingredients as $key => $ingredient) { ?>
          <li class="list-group-item"><?= $ingredient; ?></li>
          <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <h2>Instructions</h2>
      <ol class="list-group">
        <?php 
        foreach ($instructions as $key => $instruction) { ?>
          <li class="list-group-item"><?= ($key + 1).' - '.$instruction; ?></li>
          <?php } ?>
        </ol>
      </div>
    </div>
  <?php 
  } else { ?>
  <div class="container">
    <h2 class="error-message">Nous sommes désolés !!<br>
      Cette recette ne semble plus présente dans notre base.</h2>
    <div class="error-img">
      <img src="<?= _ASSETS_IMG_PATH_.'cooks.jpg'; ?>" alt="image d'une figurine cuisinier" width="600">
    </div>
  </div>
  <?php }  
  // section footer
  
  require_once "templates/footer.php";
  ?>

