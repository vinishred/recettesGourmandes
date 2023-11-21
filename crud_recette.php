<?php
require_once 'templates/header.php';
require_once 'lib/tools.php';
require_once 'lib/recipe.php';
require_once 'lib/category.php';


$errors = [];
$messages = [];
$categories = getCategories($pdo);
$fileName = null;
//on crée un tableau qui va nous servir à stocker temporairement les infos recettes rentrées par l'utilisateur si jamais sa validation échoue
$tempRecipe = [
  'title' => '',
  'description' => '',
  'ingredients' => '',
  'instructions' => '',
  'category_id' => '',
];

//on crée une itération pour valider les données de notre formulaire
//si notre utilisateur appuie sur le bouton saveRecipe on lance notre fonction requete
if(isset($_POST['saveRecipe'])) {
  // on vérifie si notre fichier image existe et n'est pas vide
  if(isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
    // on vérifie si notre fichier est bien au format image
    $checkImage = getimagesize($_FILES['file']['tmp_name']);
    if ($checkImage !== false) {
      //message si le fichier est correct 
      $messages[] = 'Votre image a bien été ajoutée';
      //on attribue a cette image un identifiant unique pour etre sur qu'un nouvelle image n'ecrase pas une ancienne si elles ont le même nom
      // on formate notre fichier pour éviter les caractères indésirables
      $fileName = uniqid().'-'.slugify($_FILES['file']['name']);
      // et on déplace notre fichier temporaire vers notre bdd
      move_uploaded_file($_FILES['file']['tmp_name'], _RECIPES_IMG_PATH_.$fileName);
    } else {
      //message si le fichier n'est pas correct
      $errors[] = 'Votre fichier n\'est pas au bon format';
    }
  }
  
  // on ajoute une condition si il n'y a pas d'erreurs alors on va sauvegarder 
  if(!$errors) {
    $newRecipe = saveRecipe($pdo, $_POST['category'], $_POST['title'], $_POST['description'],$_POST['ingredients'],$_POST['instructions'], $fileName);
    if($newRecipe) {
      $messages[] = 'Félicitations !<br>Votre recette a bien été enregistrée.';
    } else {
      $errors[] = 'Aïe !<br>Malheureusement votre recette n\'a pas pu être sauvegardée.';
    }
  }
  $tempRecipe = [
    'title' => $_POST['title'],
    'description' => $_POST['description'],
    'ingredients' => $_POST['ingredients'],
    'instructions' => $_POST['instructions'],
    'category_id' => $_POST['category'],
  ];
}
?>

<div class="container">
  <h1>Ajouter votre recette !</h1>
</div>
<!-- on parcourt notre tableau de messages -->
<?php foreach($messages as $message) { ?>
  <div class="alert alert-succes">
    <?= $message; ?>
  </div>
<?php } ?>

<!-- on parcourt notre tableau d'erreurs -->
<?php foreach($errors as $error) { ?>
  <div class="alert alert-danger">
    <?= $error; ?>
  </div>
<?php } ?>

<!-- on crée notre formulaire 
on rajoute la paramêtre enctype qui permet de récupérer les données côté php-->
<div class="container">
  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <!-- le paramêtre name permet à php d'aller chercher ce paramêtre dans la base de données -->
      <label for="title" class="form-label">Titre</label>
      <!-- for de label et id de input doivente être égaux pour être liés -->
      <input type="text" name="title" id="title" class="form-control" value="<?= $tempRecipe['title'];  ?>">
  </div>
  <div class="mb-3">
    <!-- le paramêtre name permet à php d'aller chercher ce paramêtre dans la base de données -->
    <label for="description" class="form-label">Description</label>
    <!-- for de label et id de input doivente être égaux pour être liés -->
    <input type="textarea" name="description" id="description" cols="30" rows="5" class="form-control" value="<?= $tempRecipe['description'];  ?>">
  </div>
  <div class="mb-3">
    <!-- le paramêtre name permet à php d'aller chercher ce paramêtre dans la base de données -->
    <label for="ingredients" class="form-label">Ingredients</label>
    <!-- for de label et id de input doivente être égaux pour être liés -->
    <textarea name="ingredients" id="ingredients" cols="30" rows="5" class="form-control" value="<?= $tempRecipe['ingredients'];  ?>"></textarea>
  </div>
  <div class="mb-3">
    <!-- le paramêtre name permet à php d'aller chercher ce paramêtre dans la base de données -->
    <label for="instructions" class="form-label">Instructions</label>
    <!-- for de label et id de input doivente être égaux pour être liés -->
    <textarea name="instructions" id="instructions" cols="30" rows="5" class="form-control" value="<?= $tempRecipe['instructions'];  ?>"></textarea>
  </div>
  <div class="mb-3">
    <!-- le paramêtre name permet à php d'aller chercher ce paramêtre dans la base de données -->
    <label for="category" class="form-label">Categorie</label>
    <!-- for de label et id de input doivente être égaux pour être liés -->
    <select name="category" class="form-select" id="category">
      <!-- on parcourt notre base de données -->
      <?php foreach($categories as $category) { ?>
        <option value="<?= $category['id']; ?>" <?php if ($tempRecipe['category_id'] == $category['id']) { echo 'selected="selected"';}; ?>><?= $category['name']; ?></option>
      <?php } ?>

    </select>
  </div>
  <div class="mb-3">
    <label for="file" class="form-label">Image</label>
    <input type="file" name="file" id="file">
  </div>
  <input type="submit" value="Soumettre la recette" name="saveRecipe" class="btn btn-primary">
</div>
</form>