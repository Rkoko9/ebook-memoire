<?php

namespace App\Controllers\Chercheur;

use App\Controllers\Controller;
use App\Models\Chercheur;

class ChercheurController extends Controller
{
    private $data;

    public function index()
    {
        $chercheurs=(new Chercheur())->getChercheurs();
        return $this->view("chercheur.index",compact('chercheurs'), "E-Book | Chercheurs");
    }
    public function list($id) {
        $chercheurs=(new Chercheur())->getChercheur($id);
        echo json_encode($chercheurs);
    }
}
