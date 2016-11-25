<?php

Class UsuariosModel extends UsuariosDAO {

    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $imagem;
    private $nascimento;
    private $descricao;
    private $dataRegistro;
    private $senha;
    private $status;
    private $pseudonimo;
    private $poesias;
    private $amigos;

    function __construct() {
        
    }

    public function setId($id) {

        $this->id = $id;
    }

    public function getId() {

        return $this->id;
    }

    public function setNome($nome) {

        $this->nome = $nome;
    }

    public function getNome() {

        return $this->nome;
    }

    public function setSobrenome($sobrenome) {

        $this->sobrenome = $sobrenome;
    }

    public function getSobrenome() {

        return $this->sobrenome;
    }

    public function setEmail($email) {

        $this->email = $email;
    }

    public function getEmail() {

        return $this->email;
    }

    public function setImagem($imagem) {

        $this->imagem = $imagem;
    }

    public function getImagem() {

        return $this->imagem;
    }

    public function setNascimento($nascimento) {

        $this->nascimento = $nascimento;
    }

    public function getNascimento() {

        return $this->nascimento;
    }
    
    
    public function setDescricao($descricao) {

        $this->descricao = $descricao;
    }

    public function getDescricao() {

        return $this->descricao;
    }

    public function setDataRegistro($dataRegistro) {

        $this->dataRegistro = $dataRegistro;
    }

    public function getDataRegistro() {

        return $this->dataRegistro;
    }

    public function setSenha($senha) {

        $this->senha = $senha;
    }

    public function getSenha() {

        return $this->senha;
    }

    public function setStatus($status) {

        $this->status = $status;
    }

    public function getStatus() {

        return $this->status;
    }

    public function setPseudonimo($pseudonimo) {

        $this->pseudonimo = $pseudonimo;
    }

    public function getPseudonimo() {

        return $this->pseudonimo;
    }

    public function setPoesias($poesias) {
        $this->poesias = $poesias;
    }

    public function getPoesias() {
        return $this->poesias;
    }

    function setAmigos($amigos){
        $this->amigos = $amigos;
    }

    function getAmigos() {
        return $this->amigos;
    }
    
    function getDiaNascimento(){
        $retorno = explode($this->nascimento, '-');
        return $retorno[3];          
    }
    function getMesNascimento(){
        $retorno = explode($this->nascimento, '-');
        return $retorno[2];          
    }
    function getAnoNascimento(){
        $retorno = explode($this->nascimento, '-');
        return $retorno[1];          
    }
    
    function setPathThumbImageUser() {
        $image = SD::getUrlUpload(). 'imagens_'.$this->id.'/thumbs/poeta_thumb.jpeg';
        if (!file_exists($image)) {
            $image = SD::getUrlUpload()."/imgteste.jpg";
        } 
        $this->urlThumImg = $image;
    }
    
    function getPathThumbImageUser(){
        return $this->urlThumImg;
    }

}

?>