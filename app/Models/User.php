<?php
    namespace App\Models;
    use App\Models\Model;

    class User extends Model{
        public function connexion($login,$password) {
            return $this->query("select * from $this->table where login=? and password=?",[$login,$password],true);
        }
        public function create(array $data)
        {
            $user=parent::create(['login'=>$data['login'],'password'=>$data['password']]);
            if ($user){
                $id= $this->db->getPDO()->lastInsertId();
                array_pop($data);
                array_pop($data);
                $data['id']=$id;
                $chercheur=(new Chercheur())->create($data);
                if ($chercheur) {
                    return true;
                }
                return false;
            }
            return false;
        }
    }