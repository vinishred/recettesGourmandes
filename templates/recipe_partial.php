<div class="col-md-4">
  <div class="card">
    <img src="<?= getRecipeImage($recipe['image']); ?>" class="card-img-top" alt="<?= $recipe['title'] ?>">
    <div class="card-body">
      <h5 class="card-title"><?= $recipe['title'] ?></h5>
      <p class="card-text"><?= $recipe['description'] ?></p>
<!-- on remplace notre adresse en dur par une adresse avec la key de notre tableau en variable -->
      <a href="recette.php?id=<?= $recipe['id']; ?>" class="btn btn-primary">Voir la recette</a>
    </div>
  </div>
</div>
