<!-- fichier dans lequel on définit nos éléments de config -->
<?php
// on définit une constante pour le chemin de nos images de recette
    define('_RECIPES_IMG_PATH_', 'uploads/recipes/');
//pour interroger notre URL on utilise $_SERVER
// on récupère le slug de notre page dans notre URL
    $currentPage = basename($_SERVER['SCRIPT_NAME']);
