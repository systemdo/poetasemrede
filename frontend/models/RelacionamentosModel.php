<?php

Class RelacionamentosModel extends Model {

    private $id;
    private $IdUsuarioPrimeiro;
    private $idUsuarioSegundo;
    private $idConvidador;
    private $idConvidado;
    private $status;
    private $dataCriacao;
    private $IdSolicitante;
    private $convidado;
    private $convidador;
    private $amigos;

    function __construct() {
        
    }

    public function setId($id) {

        $this->id = $id;
    }

    public function getId() {

        return $this->id;
    }

    public function setIdUsuarioPrimeiro($IdUsuarioPrimeiro) {

        $this->IdUsuarioPrimeiro = $IdUsuarioPrimeiro;
    }

    public function getIdUsuarioPrimeiro() {

        return $this->IdUsuarioPrimeiro;
    }

    public function setIdUsuarioSegundo($idUsuarioSegundo) {

        $this->idUsuarioSegundo = $idUsuarioSegundo;
    }

    public function getIdUsuarioSegundo() {

        return $this->idUsuarioSegundo;
    }

    public function setStatus($status) {

        $this->status = $status;
    }

    public function getStatus() {

        return $this->status;
    }

    public function setDataCriacao($dataCriacao) {

        $this->dataCriacao = $dataCriacao;
    }

    public function getDataCriacao() {

        return $this->dataCriacao;
    }

    public function setIdSolicitante($IdSolicitante) {

        $this->IdSolicitante = $IdSolicitante;
    }

    public function getIdSolicitante() {

        return $this->IdSolicitante;
    }

    public function setIdConvidador($idConvidador) {

        $this->idConvidador = $idConvidador;
    }

    public function getIdConvidador() {

        return $this->idConvidador;
    }

    public function setIdConvidado($idConvidado) {

        $this->idConvidado = $idConvidado;
    }

    public function getIdConvidado() {

        return $this->$idConvidado;
    }

    function getConvidado() {
        return $this->convidado;
    }

    function getConvidador() {
        return $this->convidador;
    }

    function setConvidado(UsuariosModel $convidado) {
        $this->convidado = $convidado;
    }

    function setConvidador(UsuariosModel $convidador) {
        $this->convidador = $convidador;
    }

    function setAmigos($amigos) {
        $this->amigos = $amigos;
    }

    function getAmigos() {
        return $this->amigos;
    }

}

?>