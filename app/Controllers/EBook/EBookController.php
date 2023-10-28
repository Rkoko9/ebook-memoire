<?php

namespace App\Controllers\EBook;

use App\Controllers\Controller;
use App\Models\Travail;
use App\Validation\Validator;

class EBookController extends Controller
{
    private $data;
    public function index()
    {
        $this->is_SecDep_or_is_Bibl();
        $ebooks = (new Travail())->getBooks();
        return $this->view("ebook.index", compact('ebooks'), "E-Book | Liste");
    }
    function upload()
    {
        $this->is_Etudiant();
        return $this->view("ebook.upload", null, "E-Book | upload");
    }
    function uploadPost()
    {
        $this->is_Etudiant();
        $_POST['mignature'] = $_FILES['mignature']['name'];
        $_POST['piecejointe'] = $_FILES['piecejointe']['name'];
        $_POST['mignature_file'] = $_FILES['mignature']['size'];
        $_POST['piecejointe_file'] = $_FILES['piecejointe']['size'];
        $validator = new Validator($_POST);
        $errors = $validator->validate(array(
            'intitule' => ['required', 'min:10'],
            'description' => ['required', 'min:50'],
            'piecejointe' => ['required'],
            'url_github' => ['required'],
            'mignature_file' => ['size:2000000'],
            'piecejointe_file' => ['required', 'size:2000000'],
        ));
        if ($errors) {
            return $this->view("ebook.upload", compact('errors'), "E-Book | upload");
            exit;
        }
        $this->data = $validator->getDataClean();
        array_pop($this->data);
        array_pop($this->data);
        $this->data['idEtudiant'] = $_SESSION['user'];
        $res = (new Travail())->create($this->data, $_FILES);
        if ($res) {
            header('location: /dashboard');
        } else {
            $errors[][] = "Echec d'enregistrement echoué";
            return $this->view("ebook.upload", compact('errors'), "E-Book | upload");
        }
    }
    public function voir($id)
    {
        $this->is_SecDep();
        $ebook = (new Travail())->getBook($id);
        return $this->view("ebook.voir", compact('ebook'), "E-Book Library");
    }
    public function publier($id) {
        $ebook = new Travail();
        $ebook->edit($id,['statut'=>'Bibliothèque']);
        header("location: /ebooks/voir/$id");
    }
}
