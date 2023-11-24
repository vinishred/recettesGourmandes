<?php

require_once 'templates/header.php';
require_once 'lib/pdo.php';
require_once 'lib/user.php';

$errors = [];
$messages = [];


//si quand l'utilisateur a appuyé sur le bouton loginUser le mail rentré 
// est dans notre tableau d'user alors il en envoie un message
if(isset($_POST['loginUser'])) {
  // on appelle notre fonction verifyUser et on stocke le resultat dans une variable
  $userCheck = verifyUser($pdo, $_POST['email'], $_POST['password']);
  if($userCheck) {
    //dans le tableau session on crée un nouvel élément ou on stocke le mail de notre nouvel utilisateur
    $_SESSION['user'] = ['email' => $userCheck['email']];
    $_SESSION['user'] = ['first_name' => $userCheck['first_name']];     
    // une fois enregistré l'utilisateur est redirigé vers la page d'accueil
    header('location: index.php');
  } else {
    $errors[] = 'Email ou mot de passe incorrect';
  }
}

  ?>

<div class="container">
  <h1>Connexion</h1>
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
        <input type="submit" value="Se connecter" name="loginUser" class="btn btn-primary">
      </form>
      <?php require_once 'templates/footer.php'; ?>