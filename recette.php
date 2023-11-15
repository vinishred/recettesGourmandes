  <!-- header -->
<?php
require_once 'templates/header.php';
require_once 'lib/recipe.php';

//on établit notre connexion avec la base de donnée SQL
$pdo = new PDO('mysql:dbname=cuisinea; host=localhost;charset=utf8mb4', 'root', '');
//on récupère notre id écrit dans notre URL et on le caste en int pour sécuriser
$id = (int)$_GET['id'];
var_dump($id);
//on écrit notre requete avec une variable intermédiaire qui commence par :
// pour éviter l'injection sql dans l'url
$query = $pdo->prepare("SELECT * FROM recipes WHERE id = :idSecurise");
//on relie dans notre requete cette variable à notre $id comme ça il doit être juste un chiffre
$query->bindParam('idSecurise', $id);
//on appuye sur le bouton exécuter
$query->execute();
//on stock le résultat de notre requête
$recipe = $query->fetch();
?>

  <!-- section main -->
  <div class="container">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="<?= _RECIPES_IMG_PATH_.$recipe['image'] ?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?= $recipe['title']?></h1>
        <p class="lead"><?= $recipe['description']?></p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        </div>
      </div>
    </div>
  </div>
    
  </div>
  <!-- section footer -->
  <?php
  require_once "templates/footer.php";
  ?>

