<?php
  require_once 'lib/session.php';
  require_once 'lib/config.php';
  require_once 'lib/pdo.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Les Recettes Bizarres de Gérard</title>
  <!-- inclusion de bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/override-bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
          <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
            <img src="assets/images/logo-cuisinea-horizontal.jpg" alt="logo cuisinea" width="250">
          </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 nav-pills">
          <?php
          foreach ($mainMenu as $key => $value) { ?>
          <li><a href="<?= $key; ?>" class="nav-link <?php if($currentPage === $key) { echo 'active';} ?>"><?= $value; ?></a></li>
          <?php } ?>
          
        </ul>

        <div class="col-md-3 text-end">
        <?php
        if(!isset($_SESSION['user'])) { ?>
          <a href="login.php"><button type="button" class="btn btn-primary">Se Connecter</button></a>
          <a href="inscription.php"><button type="button" class="btn btn-outline-primary me-2">S'inscrire</button></a>
        <?php } else { ?>
          <a href="logout.php"><button type="button" class="btn btn-primary">Se Déconnecter</button></a>
          <button type="button" class="btn btn-info">Connecté</button> 
        <?php } ?>
        </div>
      </header>
    </div>
