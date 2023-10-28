<?php

namespace App\Models;

use App\Exceptions\NotFoundException;
use PDO;
use Database\DBConnection;
use PDOException;

abstract class Model
{
    protected $db;
    protected $table;
    public function __construct()
    {
        $this->db = new DBConnection(DB_NAME, DB_HOST, DB_USER_NAME, DB_USER_PASSWORD);
        // detection de table
        $this->table = strtolower(explode("\\", get_class($this))[2]) . 's';
    }
    public function create(array $data)
    {
        
       
        $firtParenthesis = "";
        $secondParenthesis = "";
        $i = 1;
        foreach ($data as $key => $value) {
            $comma = $i === count($data) ? '' : ', ';
            $firtParenthesis .= "{$key}{$comma}";
            $secondParenthesis .= ":{$key}{$comma}";
            $i++;
        }
        return $this->query("INSERT INTO {$this->table} ($firtParenthesis) values($secondParenthesis)", $data);
    }
    public function edit(int $id, array $data)
    {
        $sqlPart = "";
        $i = 1;
        foreach ($data as $key => $value) {
            $comma = $i === count($data) ? '' : ', ';
            $sqlPart .= "{$key}= :{$key}{$comma}";
            $i++;
        }
        $data["id"] = $id;
        return $this->query("update {$this->table} set {$sqlPart} where id= :id", $data);
    }
    public function destroy(int $id): bool
    {
        return $this->query("delete from {$this->table} where id=?", [$id]);
    }

    public function query(string $sql, array $param = null, bool $single = null)
    {
        $res = false;
        $method = is_null($param) ? 'query' : 'prepare';
        $fetch = is_null($single) ?  'fetchAll' : 'fetch';
        try {
            $req = $this->db->getPDO()->$method($sql);
            $req->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            if ($method == 'prepare') {

                $res = $req->execute($param);
            }
            if (strpos(strtolower($sql), "select") === 0) {
                $res = $req->$fetch();
                if ($res) {
                    return $res;
                }
            }
            return $res;
        } catch (PDOException $ex) {
            // header("HTTP/1.0 404 not Found");
            // throw new NotFoundException("La page demandé est introuvable");
            echo '<pre>';
            print_r($ex);
            echo '<pre>';
        }
    }
}
