<?php

namespace App\Controllers\Etudiant;

use App\Controllers\Controller;
use App\Models\Chercheur;
use App\Models\Etudiant;
use App\Validation\Validator;

use App\Models\User;class EtudiantController extends Controller
{
    private $data;

    public function index()
    {
        $this->is_SecDep();
        $etudiants=(new Etudiant())->getEtudiants();
        $chercheurs=(new Chercheur())->getChercheurs();
        return $this->view("etudiant.index",compact('etudiants','chercheurs'), "E-Book | Etudiant");
    }
    public function ajouter() {
        $this->is_SecDep();
        $validator = new Validator($_POST);
        $errors = $validator->validate(array(
            'id' => ['required'],
            'matricule' => ['required'],
        ));
        if ($errors) {
            return $this->view("ebook.upload", compact('errors'), "E-Book | upload");
            exit;
        }
        $this->data = $validator->getDataClean();
        $res=(new Etudiant())->create($this->data);
        if($res){
            (new User())->edit($this->data['id'],['fonction'=>'Etudiant']);
            header('location: /etudiants');
        }else{
            $errors[][]="echec d'enregisretement";
            $etudiants=(new Etudiant())->getEtudiants();
            $chercheurs=(new Chercheur())->getChercheurs();
            return $this->view("etudiant.index",compact('etudiants','chercheurs','errors'), "E-Book | Etudiant");
        }
    }
}
