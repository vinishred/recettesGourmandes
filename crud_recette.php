<?php
require_once 'templates/header.php';
require_once 'lib/tools.php';
require_once 'lib/recipe.php';
//on crée une itération pour valider les données de notre formulaire
if(isset($_POST['saveRecipe'])) {
  $test = saveRecipe($pdo, $_POST['category'], $_POST['title'], $_POST['description'],$_POST['ingredients'],$_POST['instructions'], null);
}
?>

<!-- on crée notre formulaire 
on rajoute la paramêtre enctype qui permet de récupérer les données côté php-->
<div class="container">
  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <!-- le paramêtre name permet à php d'aller chercher ce paramêtre dans la base de données -->
      <label for="title" class="form-label">Titre</label>
      <!-- for de label et id de input doivente être égaux pour être liés -->
      <input type="text" name="title" id="title" class="form-control">
  </div>
  <div class="mb-3">
    <!-- le paramêtre name permet à php d'aller chercher ce paramêtre dans la base de données -->
    <label for="description" class="form-label">Description</label>
    <!-- for de label et id de input doivente être égaux pour être liés -->
    <input type="textarea" name="description" id="description" cols="30" rows="5" class="form-control">
  </div>
  <div class="mb-3">
    <!-- le paramêtre name permet à php d'aller chercher ce paramêtre dans la base de données -->
    <label for="ingredients" class="form-label">Ingredients</label>
    <!-- for de label et id de input doivente être égaux pour être liés -->
    <textarea name="ingredients" id="ingredients" cols="30" rows="5" class="form-control"></textarea>
  </div>
  <div class="mb-3">
    <!-- le paramêtre name permet à php d'aller chercher ce paramêtre dans la base de données -->
    <label for="instructions" class="form-label">Instructions</label>
    <!-- for de label et id de input doivente être égaux pour être liés -->
    <textarea name="instructions" id="instructions" cols="30" rows="5" class="form-control"></textarea>
  </div>
  <div class="mb-3">
    <!-- le paramêtre name permet à php d'aller chercher ce paramêtre dans la base de données -->
    <label for="category" class="form-label">Categorie</label>
    <!-- for de label et id de input doivente être égaux pour être liés -->
    <select name="category" class="form-select" id="category">
      <option value="1">Entrée</option>
      <option value="2">Plat</option>
      <option value="3">Dessert</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="file" class="form-label">Image</label>
    <input type="file" name="file" id="file">
  </div>
  <input type="submit" value="Soumettre la recette" name="saveRecipe" class="btn btn-primary">
</div>
</form>