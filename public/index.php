<?php

require "../app/Autoloader.php";
App\Autoloader::register();
// On teste l'autoload
//App\Utils::print_r_pre($_GET);

// On récup la variable P pour déterminer la page à afficher
$p = isset($_GET['p']) ? $_GET['p'] : "home";

// On détermine le aprcours pour afficher la vue

$view = is_file("../views/pages/$p.php") ? "../views/pages/$p.php" :"../views/404.php";

// On se connecte à la database
//$db = \App\Config::getDb();

switch($p){

   case "home":
    $posts = \App\Tables\Posts::getAll();
    $count = \App\Tables\Posts::getCount();
    //\App\Utils::var_dump_pre($posts);
   break;

   case "single":
    $id= isset ($_GET['id']) && ((int)$_GET['id']*1)>0 ? $_GET['id'] : 1;
    $posts = \App\Tables\Posts::getOne($id);
    $siteTitle = \App\Config::getTitle();
    \App\Config::setTitle($posts[0]->title."|".$siteTitle);
   break;

   case "categories":
    $categories = \App\Tables\Categories::getAll();
   break;

   case "category":
    $id= isset ($_GET['id']) && ((int)$_GET['id']*1)>0 ? $_GET['id'] : 1;
    $category = \App\Tables\Categories::getOne($id);
    $posts = \App\Tables\Posts::getPostsByCat($id);
   break;
}

// On se déconnecte
//$db = null;

// On charge la vue dans la mémoire tampon
ob_start();
require $view;
$view_content = ob_get_clean();
// On charge le template qui va contenir le rendu final
require "../views/templates/default.php";
