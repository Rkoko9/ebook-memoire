<?php
    namespace App\Models;
    use App\Models\Model;

    class Chercheur extends Model{
        public function getChercheurs() {
            return $this->query("select * from $this->table where id not in(select id from etudiants)  order by nom");
        }
        public function getChercheur($id) {
            return $this->query("select * from $this->table  where id=?",[$id],true);
        }
        public function getAllChercheurs() {
            return $this->query("select * from $this->table");
        }

        public function getNAbonne($n) {
            return $this->query("select * from $this->table where id not in(select id from etudiants)  LIMIT ?",[$n]);
        }
       
    }
