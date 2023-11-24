<!-- fichier dans lequel on définit nos éléments de config -->
<?php
// on définit une constante pour le chemin de nos images de recette
    define('_RECIPES_IMG_PATH_', 'uploads/recipes/');
    define('_ASSETS_IMG_PATH_', 'assets/images/');
    define('_HOME_RECIPES_LIMIT_', 6);
//pour interroger notre URL on utilise $_SERVER
// on récupère le slug de notre page dans notre URL
    $currentPage = basename($_SERVER['SCRIPT_NAME']);
//on fait le main menu
    $mainMenu = [
        'index.php' => 'Accueil',
        'recettes.php' => 'Recettes',
        'a_propos.php' => 'A propos',
        'crud_recette.php' => 'Vos recettes',
    ];
