<?php

namespace App\Controllers\Users;

use App\Controllers\Controller;
use App\Models\Abonnement;
use App\Models\Travail;
use App\Models\User;
use App\Validation\Validator;

class UserController extends Controller
{
    private $data;
    public function connexion()
    {
        if (!$_SESSION['user']) {
            require VIEW . 'users' . DIRECTORY_SEPARATOR . 'connexion.php';
        }else {
            header('location: /');
        }
        
    }

    public function index()
    {
        $this->is_non_chercheur();
        $nbBooksSoumis = (new Travail())->getNbBooksSoumis();
        $nbBookLecture = (new Travail())->getNbBooksLectures();
        $nbBooks = (new Travail())->getNbBooks();
        $NBooks = (new Travail())->getNBooks(10);
        $NbAbonnnements = (new Abonnement())->getNbAbonnnements(10);
        $NAbonnes = (new Abonnement())->getNAbonnements(10);
        return $this->view("users.index", compact('nbBooksSoumis', 'nbBookLecture', 'nbBooks', 'NBooks','NbAbonnnements','NAbonnes'), "E-Book Library");
    }
    public function login()
    {

        $validator = new Validator($_POST);
        $_SESSION["errors"] = $validator->validate(array(
            'login' => ['required'],
            'password' => ['required']
        ));
        if ($_SESSION["errors"]) {
            require VIEW . 'users' . DIRECTORY_SEPARATOR . 'connexion.php';
            exit;
        }
        $this->data = $validator->getDataClean();
        $user = (new User())->connexion($this->data['login'], $this->data['password']);
        if ($user) {
            $_SESSION['type_user'] = $user->fonction;
            $_SESSION['login'] = $user->login;
            $_SESSION['user'] = $user->id;
            if ($_SESSION['type_user'] === 'chercheur')
                header("location: /dashboard");
            else
                header("location: /");
        } else {
            $_SESSION["errors"][][] = "Pseudo ou mot de passe incorret";
            require VIEW . 'users' . DIRECTORY_SEPARATOR . 'connexion.php';
        }
    }

    public function signUp()
    {
        require VIEW . 'users' . DIRECTORY_SEPARATOR . 'creerCompte.php';
    }

    public function signUpPost()
    {
        $validator = new Validator($_POST);
        $_SESSION["errors"] = $validator->validate(array(
            'nom' => ['required', 'min:3'],
            'postnom' => ['required', 'min:5'],
            'sexe' => ['required'],
            'login' => ['required'],
            'password' => ['required', 'password', 'min:6']
        ));
        if ($_SESSION["errors"]) {
            require VIEW . 'users' . DIRECTORY_SEPARATOR . 'creerCompte.php';
            exit;
        }
        $this->data = $validator->getDataClean();
        array_pop($this->data);

        $id = (new User())->create($this->data);
        if ($id) {
            $_SESSION['type_user'] = 'chercheur';
            $_SESSION['login'] = $this->data['login'];
            $_SESSION['user'] = $id;
            header("location: /");
        } else {
            $errors[][] = "Echec d'enregistrement";
            require VIEW . 'users' . DIRECTORY_SEPARATOR . 'creerCompte.php';
        }
    }

    public function logout()
    {
        session_destroy();
        header("location: /");
    }
}
