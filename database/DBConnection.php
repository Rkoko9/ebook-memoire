<?php
    namespace Database;
    use PDO;
    class DBConnection{
        private $dbname;
        private $host;
        private $username;
        private $password;
        private $pdo;
        public function __construct(string $dbname="myApp",string $host="localhost",string $username="root",string $password="")
        {
            $this->dbname=$dbname;
            $this->host=$host;
            $this->username=$username;
            $this->password=$password;
        }

        public function getPDO():PDO
        {
           return $this->pdo ?? $this->pdo=new PDO("mysql:dbname={$this->dbname};host={$this->host}",$this->username,$this->password,
           [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_OBJ
        ]);
        }
    }
?>