<?php

namespace App\Controllers\Abonnement;

use App\Controllers\Controller;
use App\Models\Abonnement;
use App\Models\Chercheur;
use App\Validation\Validator;

class AbonnementController extends Controller
{
    private $data;

    public function index()
    {
        $chercheurs = (new Chercheur())->getAllChercheurs();
        $abonnements = (new Abonnement())->getAbonnements();
        return $this->view("abonnement.index", compact('abonnements', 'chercheurs'), "E-Book | Abonnements");
    }
    public function list($id)
    {
        $abonnement = (new Abonnement())->getAbonnement($id);
        echo json_encode($abonnement);
    }
    public function ajouter()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate(array(
            'idChercheur' => ['required'],
            'dateDebut' => ['required'],
            'dateFin' => ['required'],
        ));
        if ($errors) {
            return $this->view("abonnement.index", compact('errors'),  "E-Book | Abonnements");
            exit;
        }
        $this->data = $validator->getDataClean();
        $res = (new Abonnement())->create($this->data);
        if ($res) {
            header('location: /abonnements');
        } else {
            $errors[][] = "Echec d'enregistrement";
            return $this->view("abonnement.index", compact('errors'),  "E-Book | Abonnements");
            exit;
        }
    }
    public function edit($id)
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate(array(
            'idChercheur' => ['required'],
            'dateDebut' => ['required'],
            'dateFin' => ['required'],
        ));
        if ($errors) {
            return $this->view("abonnement.index", compact('errors'),  "E-Book | Abonnements");
            exit;
        }
        $this->data = $validator->getDataClean();
        $res = (new Abonnement())->edit($id,$this->data);
        if ($res) {
            header('location: /abonnements');
        } else {
            $errors[][] = "Echec de modification";
            return $this->view("abonnement.index", compact('errors'),  "E-Book | Abonnements");
            exit;
        }
    }

    public function delete($id)
    {
        $res = (new Abonnement())->destroy($id);
        if ($res) {
            header('location: /abonnements');
        } else {
            $errors[][] = "Echec de suppression";
            return $this->view("abonnement.index", compact('errors'),  "E-Book | Abonnements");
            exit;
        }
    }
}
