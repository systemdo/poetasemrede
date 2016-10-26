<?php

Class Model {

    protected $db;

    function __construct() {
        $db = SD::$DB;
        $this->db = $db::connect();
    }

    protected function consultOne($query, $error = false) {
        $consult = $this->db->prepare($query);
        $consult->execute();
        $result = $consult->fetch(PDO::FETCH_OBJ);

        if ($result) {
            return $result;
        }else{
            throw new Exception("Dados Não Encontrado");
        } 
        return false;
    }

    protected function consultAll($query, $error = false) {
        $consult = $this->db->prepare($query);
        $consult->execute();
        $result = $consult->fetchAll(PDO::FETCH_OBJ);

        if ($result) {
            return $result;
        }else{
            throw new Exception("Dados Não Encontrado");
        }       
        return false;
    }

}

?>
