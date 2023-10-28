<?php

namespace App\Controllers;

abstract class Controller
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    protected function view(string $path, array $params = null, $title = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEW . $path . '.php';
        $content[] = ob_get_clean();
        if (isset($_SESSION['type_user']) && $_SESSION['type_user'] === "Etudiant" || isset($_SESSION['type_user']) && $_SESSION['type_user'] === "Sec Dep" || isset($_SESSION['type_user']) && $_SESSION['type_user'] === "Bibliothèquaire" || explode('\\', get_class($this))[3]) {
            if (explode('\\', get_class($this))[3] === 'PublicController') {
                require VIEW . 'layout.php';
            } else {
                require VIEW . 'layout-admin.php';
            }
        } else {
            require VIEW . 'layout.php';
        }
    }
    protected function is_non_chercheur()
    {
        if (isset($_SESSION['type_user']) && $_SESSION['type_user'] === "Etudiant" || isset($_SESSION['type_user']) && $_SESSION['type_user'] === "Sec Dep" || $_SESSION['type_user'] === "Bibliothècaire") {
            return true;
        } else {
            if (isset($_SESSION['type_user'])) {
                header("location: /");
            } else {
                header("location: /connexion");
            }
        }
    }
    protected function is_Etudiant()
    {
        if (isset($_SESSION['type_user']) && $_SESSION['type_user'] === "Etudiant") {
            return true;
        } else {
            if (isset($_SESSION['type_user'])) {
                header("location: /dashboard");
            } else {
                header("location: /connexion");
            }
        }
    }
    protected function is_SecDep_or_is_Bibl()
    {
        if (isset($_SESSION['type_user']) && $_SESSION['type_user'] === "Sec Dep" || isset($_SESSION['type_user']) && $_SESSION['type_user'] === "Bibliothècaire") {
            return true;
        } else {
            if (isset($_SESSION['type_user'])) {
                header("location: /dashboard");
            } else {
                header("location: /connexion");
            }
        }
    }
    protected function is_SecDep()
    {
        if (isset($_SESSION['type_user']) && $_SESSION['type_user'] === "Sec Dep") {
            return true;
        } else {
            if (isset($_SESSION['type_user'])) {
                header("location: /dashboard");
            } else {
                header("location: /connexion");
            }
        }
    }
    protected function is_Auth()
    {
        if (isset($_SESSION['type_user'])) {
            return true;
        } else {
            header("location: /connexion");
        }
    }
}
