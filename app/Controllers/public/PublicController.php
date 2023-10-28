<?php

namespace App\Controllers\Public;

use App\Controllers\Controller;
use App\Models\Abonnement;
use App\Models\Travail;
use App\Validation\Validator;

class PublicController extends Controller
{
    private $data;
    public function index()
    {
        if ($this->checkAbonnement()) {
            if(isset($_GET['q'])){
                $this->is_Auth();
                $books = (new Travail())->search($_GET['q']);
            }else{
                $books = (new Travail())->getAllBooks();
    
            }
            return $this->view("public.index", compact('books'), "E-Book Library");
        }else{
            return $this->view("public.finAbonnement", compact('books'), "E-Book Library");
        }
       
    }
    public function checkAbonnement()
    {
        $abonnement = (new Abonnement())->checkAbonnement();
        if ($_SESSION['type_user'] == 'Chercheur' || $_SESSION['type_user'] == 'Etudiant') {
            if ($abonnement) {
                return true;
            } else {
                return false;
            }
        }
        return true;
    }
    public function eBook($id)
    {
        $this->is_Auth();
        $this->checkAbonnement();
        $ebook = (new Travail())->getBook($id);
        (new Travail())->edit($id, ['nbVue' => $ebook->nbVue + 1]);
        return $this->view("public.detail", compact('ebook'), "E-Book Library");
    }
}
