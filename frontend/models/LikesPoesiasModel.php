<?php

Class LikesPoesiasModel extends Model {

    private $id;
    private $idUsuario;
    private $idPoesia;
    private $dataLike;

    function __construct() {
        
    }

    public function setId($id) {

        $this->id = $id;
    }

    public function getId() {

        return $this->id;
    }

    public function setIdUsuario($idUsuario) {

        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario() {

        return $this->idUsuario;
    }

    public function setIdPoesia($idPoesia) {

        $this->idPoesia = $idPoesia;
    }

    public function getIdPoesia() {

        return $this->idPoesia;
    }

    public function setDataLike($dataLike) {

        $this->dataLike = $dataLike;
    }

    public function getDataLike() {

        return $this->dataLike;
    }

}

?>