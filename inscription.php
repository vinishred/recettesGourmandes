<?php

require_once 'templates/header.php';
require_once 'lib/pdo.php';
require_once 'lib/user.php';

$errors = [];
$messages = [];


//si quand l'utilisateur a appuyé sur le bouton loginUser le mail rentré 
// est dans notre tableau d'user alors il en envoie un message
if(isset($_POST['addUser'])) {
  $register = addUser($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']);

  if($register) {
    $messages[] = 'Votre inscription a réussi<br>Bienvenue chez Cuisinea';
  } else {
    $errors[] = 'Une erreur s\'est produite lors de l\'inscription.';
  }
}

  ?>

<div class="container">
  <h1>Inscription</h1>
  <!-- on parcourt notre tableau de messages -->
  <?php foreach($messages as $message) { ?>
    <div class="alert alert-success">
      <?= $message; ?>
    </div>
    <?php } ?>
    
  <!-- on parcourt notre tableau d'erreurs -->
  <?php foreach($errors as $error) { ?>
    <div class="alert alert-danger">
      <?= $error; ?>
    </div>
    <?php } ?>
</div>
    <!-- on crée notre formulaire d'inscription/connexion
    on rajoute la paramêtre enctype qui permet de récupérer les données côté php-->
    <div class="container">
      <form method="post" enctype="multipart/form-data">
      <div class="mb-3">
          <!-- le paramêtre name permet à php d'aller chercher ce paramêtre dans la base de données -->
          <label for="first_name" class="form-label">Prénom</label>
          <!-- for de label et id de input doivente être égaux pour être liés -->
          <input type="text" name="first_name" id="first_name" class="form-control">
        </div>
      <div class="mb-3">
        <!-- le paramêtre name permet à php d'aller chercher ce paramêtre dans la base de données -->
        <label for="last_name" class="form-label">Nom</label>
        <!-- for de label et id de input doivente être égaux pour être liés -->
        <input type="text" name="last_name" id="last_name" class="form-control">
      </div>
        <div class="mb-3">
          <!-- le paramêtre name permet à php d'aller chercher ce paramêtre dans la base de données -->
          <label for="email" class="form-label">Email</label>
          <!-- for de label et id de input doivente être égaux pour être liés -->
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="mb-3">
          <!-- le paramêtre name permet à php d'aller chercher ce paramêtre dans la base de données -->
          <label for="password" class="form-label">Mot de passe</label>
          <!-- for de label et id de input doivente être égaux pour être liés -->
          <input type="text" name="password" id="password" class="form-control">
        </div>
        <input type="submit" value="S'inscrire'" name="addUser" class="btn btn-primary">
      </form>
      <?php require_once 'templates/footer.php'; ?>