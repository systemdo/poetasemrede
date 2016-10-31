<?php

Class ComentariosModel extends Model {

    private $id;
    private $comentario;
    private $resposta;
    private $idUsuario;
    private $idPoesia;
    private $dataCriacao;
    private $dataUpdate;

    function __construct() {
        
    }

    public function setId($id) {

        $this->id = $id;
    }

    public function getId() {

        return $this->id;
    }

    public function setComentario($comentario) {

        $this->comentario = $comentario;
    }

    public function getComentario() {

        return $this->comentario;
    }

    public function setResposta($resposta) {

        $this->resposta = $resposta;
    }

    public function getResposta() {

        return $this->resposta;
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

    public function setDataCriacao($dataCriacao) {

        $this->dataCriacao = $dataCriacao;
    }

    public function getDataCriacao() {

        return $this->dataCriacao;
    }

    public function setDataUpdate($dataUpdate) {

        $this->dataUpdate = $dataUpdate;
    }

    public function getDataUpdate() {

        return $this->dataUpdate;
    }

}

?>