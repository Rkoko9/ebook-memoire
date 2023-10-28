<?php

namespace App\Models;

use App\Models\Model;
use Database\DBConnection;
use DateTime;

class Travail extends Model
{
    function __construct()
    {
        $this->db = new DBConnection(DB_NAME, DB_HOST, DB_USER_NAME, DB_USER_PASSWORD);
        $this->table = 'travaux';
    }
    public function getAllBooks()
    {
        return $this->query("select etudiants.*, travaux.* from travaux inner join (etudiants inner join chercheurs on chercheurs.id=etudiants.id) on etudiants.id=travaux.idEtudiant where statut='Bibliothèque'");
    }
    public function getBook($id)
    {
        if ($_SESSION['type_user'] === 'Sec Dep') {
            return $this->query("select chercheurs.*, travaux.* from travaux inner join (etudiants inner join chercheurs on chercheurs.id=etudiants.id) on etudiants.id=travaux.idEtudiant where travaux.id=?", [$id], true);
        } else {
            return $this->query("select  chercheurs.*, travaux.*  from travaux inner join (etudiants inner join chercheurs on chercheurs.id=etudiants.id) on etudiants.id=travaux.idEtudiant where travaux.id=? and statut='Bibliothèque'", [$id], true);
        }
    }
    public function getBooks()
    {
        if ($_SESSION['type_user'] === 'Etudiant') {
            return $this->query("select * from travaux where idEtudiant=?", [$_SESSION['user']]);
        } elseif ($_SESSION['type_user'] === 'Bibliothècaire') {
            return $this->query("select * from travaux where statut='Bibliothèque'");
        }
        return $this->query("select * from travaux");
    }
    function create(array $data, ?array $files = null)
    {
        $res = parent::create($data);
        if ($res) {
            if (!empty($_FILES['mignature']['tmp_name'])) {
                $name = $_FILES['mignature']['name'];
                move_uploaded_file($_FILES['mignature']['tmp_name'], "upload/mignature/$name");
            }
            $name = $_FILES['piecejointe']['name'];
            move_uploaded_file($_FILES['piecejointe']['tmp_name'], "upload/eBook/$name");
            return true;
        }
        return false;
    }

    public function search($key)
    {
        return $this->query("select * from $this->table where intitule like ? or description like ? ", ['%' . $key . '%', '%' . $key . '%']);
    }

    public function getNoms()
    {
        return $this->nom . ' ' . $this->postnom . ' ' . $this->prenom;
    }
    public function getDescription()
    {
        return substr($this->description, 0, 50) . '...';
    }
    public function getDate()
    {
        $date = (new DateTime($this->dateDepot))->format("d/m/Y");
        return $date;
    }
    public function getNbBooksSoumis()
    {
        if ($_SESSION['type_user'] === 'Etudiant') {
            return $this->query("select count(id) as nb from $this->table where datedepot=date(now()) and idEtudiant=?", [$_SESSION['user']], true);
        }
        return $this->query("select count(id) as nb from $this->table where datedepot=date(now())", null, true);
    }
    public function getNbBooksLectures()
    {
        if ($_SESSION['type_user'] === 'Etudiant') {
            return $this->query("select count(nbVue) as nb from $this->table where idEtudiant=?", [$_SESSION['user']], true);
        }
        return $this->query("select count(nbVue) as nb from $this->table", null, true);
    }
    public function getNbBooks()
    {
        if ($_SESSION['type_user'] === 'Etudiant') {
            return $this->query("select count(id) as nb from $this->table where idEtudiant=?", [$_SESSION['user']], true);
        } elseif ($_SESSION['type_user'] === 'Bibliothècaire') {
            return $this->query("select count(id) as nb from $this->table where statut='Bibliothèque'", null, true);
        }
        return $this->query("select count(id) as nb from $this->table", null, true);
    }

    public function getNBooks($n)
    {
        if ($_SESSION['type_user'] === 'Etudiant') {
            return $this->query("select * from $this->table inner join (etudiants inner join chercheurs on chercheurs.id=etudiants.id) on etudiants.id=travaux.idEtudiant where idEtudiant=?", [$_SESSION['user']]);
        } elseif ($_SESSION['type_user'] === 'Bibliothècaire') {
            return $this->query("select * from $this->table inner join (etudiants inner join chercheurs on chercheurs.id=etudiants.id) on etudiants.id=travaux.idEtudiant where statut='Bibliothèque' LIMIT $n");
        }
        return $this->query("select * from $this->table inner join (etudiants inner join chercheurs on chercheurs.id=etudiants.id) on etudiants.id=travaux.idEtudiant LIMIT $n");
    }
}
