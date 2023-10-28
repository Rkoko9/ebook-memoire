<?php
    namespace App\Models;
    use App\Models\Model;

    class Etudiant extends Model{
        public function getEtudiants() {
            return $this->query("select * from $this->table inner join chercheurs on chercheurs.id=$this->table.id");
        }
    }
?>