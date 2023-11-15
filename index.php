  <!-- header -->
    <?php
      require_once 'templates/header.php';
      require_once 'lib/recipe.php';
    ?>

  <!-- section main -->
  <div class="container">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="assets/images/logo-cuisinea.jpg" alt="logo cuisinea" width="300">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">Cuisinea - Les Recettes Gourmandes de Yolande</h1>
        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores dicta totam consequuntur illum. Cum aliquid quis voluptatem quidem quam earum enim. Incidunt et aperiam at hic laudantium ut tempora? Veniam eligendi incidunt dolorum officia similique tempora doloribus nam voluptas dignissimos voluptates laboriosam beatae, praesentium minima, officiis ex ipsum ipsam obcaecati!</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <a href="recettes.php" class="btn btn-primary">Voir nos recettes</a>
        </div>
      </div>
    </div>
    <!-- cards -->
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
  </div>
  <!-- section footer -->
  <?php
  require_once "templates/footer.php";
  ?>
