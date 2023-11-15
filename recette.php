  <!-- header -->
  <?php
      require_once 'templates/header.php';
      require_once 'lib/recipe.php';
//on récupère le paramètre id qui a été écrit dans notre URL
      $id = $_GET['id'];
//on affiche la recette du tableau corespondant à cet id
      // var_dump($recipes[$id]);

  ?>

  <!-- section main -->
  <div class="container">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="<?= _RECIPES_IMG_PATH_.$recipes[$id]['image'] ?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?= $recipes[$id]['title']?></h1>
        <p class="lead"><?= $recipes[$id]['description']?></p>
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

