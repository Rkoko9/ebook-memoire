<?php
     namespace App\Validation;
     class Validator{
        private $data;
        private $errors;
        public function __construct($data)
        {
            $this->data=$data;
        }
        public function validate(array $rules):?array
        {
            foreach ($rules as $name => $rulesArray) {
                if(array_key_exists($name,$this->data)){
                    foreach ($rulesArray as $rule) {
                        switch ($rule) {
                            case 'required':
                               $this->required($name,$this->data[$name]);
                                break;
                            case substr($rule,0,3)=='min':
                                $this->min($name,$this->data[$name],$rule);
                                break;
                            case  substr($rule,0,3)=='size':
                                $this->size($name,$this->data[$name],$rule);
                                break;
                            case 'password':
                                $this->passwordVerify($name,$this->data[$name],$this->data[$name.'2']);
                                    break;
                        }
                    }
                }
            }
            return $this->getErrors();
        }
        private function required(string $name,string $value)
        {
            $value=trim($value);
            if (!isset($value) || is_null($value) || empty($value)) {
            $this->errors[$name][]=  str_replace('_',' ',$name) ." est obligatoire";
            }
        }
        private function passwordVerify(string $name,string $value,string $value2)
        {
            if ($value!==$value2) {
                $this->errors[$name][]="Les mots de passe ne sont pas conformes";
            }
        }
        private function min(string $name,string $value,string $rule)
        {
            preg_match_all("#(\d+)#",$rule,$matches);
            $limit=(int)$matches[0][0];
            if(strlen($value)<$limit){
                $this->errors[$name][]="{$name} doit être au minimum de {$limit} caractères";
            }
        }
        private function size(string $name,int $file_size,string $rule)
        {
            preg_match_all("#(\d+)#",$rule,$matches);
            $limit=(int)$matches[0][0];
            if($file_size>$limit){
                $this->errors[$name][]="{$name} a une taille superieur à {$limit} octets";
            }
        }
        private  function getErrors():?array
        {
            return $this->errors;
        }
        public function getDataClean()
        {
            $data_clean=[];
            foreach ($this->data as $key => $value) {
                $data_clean[$key]=htmlspecialchars($value);
            }
            return $data_clean;
        }
     }
