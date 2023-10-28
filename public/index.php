<?php

use App\Exceptions\NotFoundException;
use Router\Router;

    require '../vendor/autoload.php';

    // gestion des erreurs
    error_reporting(E_ALL);
    ini_set("display_errors",0);
    // fin

    define('VIEW',dirname(__DIR__) .DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
    define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
    define("DB_NAME",'eBook');
    define("DB_HOST",'localhost');
    define("DB_USER_NAME",'root');
    define("DB_USER_PASSWORD","");
    $router = new Router($_GET['url']);
    $router->get('/',"App\Controllers\Public\PublicController@index");
    $router->get('/detail/:id',"App\Controllers\Public\PublicController@eBook");

    $router->get('/dashboard',"App\Controllers\Users\UserController@index");
    $router->get('/etudiants',"App\Controllers\Etudiant\EtudiantController@index");
    $router->post('/etudiants',"App\Controllers\Etudiant\EtudiantController@ajouter");
    $router->get('/chercheurs',"App\Controllers\Chercheur\ChercheurController@index");
    $router->get('/fetch-chercheurs/:id',"App\Controllers\Chercheur\ChercheurController@list");
    $router->get('/ebooks',"App\Controllers\EBook\EBookController@index");
    $router->get('/upload',"App\Controllers\EBook\EBookController@upload");
    $router->post('/upload',"App\Controllers\EBook\EBookController@uploadPost");
    $router->get('/abonnements',"App\Controllers\Abonnement\AbonnementController@index");
    $router->post('/abonnements',"App\Controllers\Abonnement\AbonnementController@ajouter");
    $router->get('/fetch-abonnements/:id',"App\Controllers\Abonnement\AbonnementController@list");
    $router->post('/abonnements/edit/:id',"App\Controllers\Abonnement\AbonnementController@edit");
    $router->post('/abonnements/delete/:id',"App\Controllers\Abonnement\AbonnementController@delete");
    $router->get('/ebooks/voir/:id',"App\Controllers\EBook\EBookController@voir");
    $router->post('/ebooks/change-statut/:id',"App\Controllers\EBook\EBookController@publier");
    $router->get('/connexion',"App\Controllers\Users\UserController@connexion");
    $router->post('/connexion',"App\Controllers\Users\UserController@login");
    $router->get('/deconnexion',"App\Controllers\users\UserController@logout");
    $router->get('/creer-compte',"App\Controllers\users\UserController@signUp");
    $router->post('/creer-compte',"App\Controllers\users\UserController@signUpPost");
    try{
        $router->run();
    }catch(NotFoundException $ex){
        return $ex->error404();
    }
?>