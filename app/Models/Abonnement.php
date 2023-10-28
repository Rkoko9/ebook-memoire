<?php

namespace App\Models;

use App\Models\Model;

class Abonnement extends Model
{
    public function getAbonnements()
    {
        return $this->query("select abonnements.*, nom,postnom,prenom,sexe from abonnements inner join chercheurs on chercheurs.id=abonnements.idChercheur");
    }
    public function getAbonnement($id)
    {
        return $this->query("select  abonnements.*, nom,postnom,prenom,sexe from abonnements abonnements inner join chercheurs on chercheurs.id=abonnements.idChercheur where abonnements.id=?", [$id], true);
    }
    public function checkAbonnement()
    {
        return $this->query("SELECT * from abonnements where datefin>=DATE(now()) and idChercheur=?", [$_SESSION['user']]);
    }
    public function getNbAbonnnements()
    {
        if ($_SESSION['type_user'] === 'Etudiant') {
            return $this->query("select count(id) as nb from $this->table order by datefin desc",null,true);
        }
        return $this->query("select count(id) as nb from $this->table where datefin>=DATE(now())",null,true);
    }
    public function getNAbonnements($n)
    {
        return $this->query("select abonnements.*, nom,postnom,prenom,sexe from abonnements inner join chercheurs on chercheurs.id=abonnements.idChercheur where datefin>=DATE(now()) group by idChercheur LIMIT $n");
    }
}
