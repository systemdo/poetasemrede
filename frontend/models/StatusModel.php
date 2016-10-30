<?php

Class StatusModel extends Model {

    private $id;
    private $status;
    
    const STATUS_CONVITE_ENVIADO = 3;
    
    const STATUS_CONVITE_ACEITO = 4;

    function __construct() {
        
    }

    public function setId($id) {

        $this->id = $id;
    }

    public function getId() {

        return $this->id;
    }

    public function setStatus($status) {

        $this->status = $status;
    }

    public function getStatus() {

        return $this->status;
    }

}

?>