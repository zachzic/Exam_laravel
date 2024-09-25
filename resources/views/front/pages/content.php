 <?php
    $p = isset($_GET['url']) ? $_GET['url']:"Accueil";
    switch($p)
    {
        case"Accueil":include("pages/main.php"); break;
        case"A-propos":include("pages/apropos.php"); break;
        case"Projet":include("pages/projet.php"); break;
        case"Service":include("pages/service.php"); break;
        case"Blog":include("pages/blog.php"); break;
        case"Contact":include("pages/contact.php"); break;
        default: include("404.php"); break;
    }
 ?>