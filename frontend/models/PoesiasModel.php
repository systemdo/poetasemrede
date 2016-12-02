<?php

Class PoesiasModel extends Model {

    private $id;
    private $titulo;
    private $corpo;
    private $idUsuario;
    private $dataCriacao;
    private $dataAtualizacao;
    private $status;
    
    private $like;
    
    private $countLike;

    function __construct() {
        
    }

    public function setId($id) {

        $this->id = $id;
    }

    public function getId() {

        return $this->id;
    }

    public function setTitulo($titulo) {

        $this->titulo = $titulo;
    }

    public function getTitulo() {

        return $this->titulo;
    }

    public function setCorpo($corpo) {

        $this->corpo = $corpo;
    }

    public function getCorpo() {

        return $this->corpo;
    }

    public function setIdUsuario($idUsuario) {

        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario() {

        return $this->idUsuario;
    }

    public function setDataCriacao($dataCriacao) {

        $this->dataCriacao = $dataCriacao;
    }

    public function getDataCriacao() {

        return $this->dataCriacao;
    }

    public function setDataAtualizacao($dataAtualizacao) {

        $this->dataAtualizacao = $dataAtualizacao;
    }

    public function getDataAtualizacao() {

        return $this->dataAtualizacao;
    }

    public function setStatus($status) {

        $this->status = $status;
    }

    public function getStatus() {

        return $this->status;
    }
    function getLike() {
        return $this->like;
    }

    function getCountLike() {
        return $this->countLike;
    }

    function setLike($like) {
        if(!empty($like)){
            $this->like = $like->id;
        }else{
            $this->like = false;
        }
        
    }

    function setCountLike($countLike) {
        $this->countLike = $countLike;
    }


}

?>