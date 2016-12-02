<?php

class UserSystem {

    protected $id;
    protected $name;
    protected $email;
    protected $pseudonimo;
    protected $urlThumImg;

    public function __construct($email, $password) {
        $query = "SELECT id, email, senha, nome, pseudonimo
                FROM Usuarios
                WHERE email = '$email'
                AND senha = '$password'";
   
        $con = DB::getStatement($query);
        $con->execute();
        $result = $con->fetch(PDO::FETCH_OBJ);
     
        if ($result) {
            if ($result->email == $email) {
                if ($result->senha == $password) {
                    $this->email = $result->email;
                    $this->name = $result->nome;
                    $this->pseudonimo = $result->pseudonimo;
                    $this->id = $result->id;
                }
            }
        } else {
            $this->id = false;
        }
    }

    function getId() {
        return $this->id;
    }

    static function user() {
        return Login::getUserSession();
    }
    
    static function getPathThumbImageUser() {
        $user = Login::getUserSession();
        $id = $user->getId();
        $image = SD::getPathUpload(). '/imagens_'.$id.'/thumbs/poeta_thumb.jpeg';
        //echo $image;
        if (!file_exists($image)) {
            $image = SD::getUrlUpload()."/imgteste.jpg";
        }else{
            $image = SD::getUrlUpload(). '/imagens_'.$id.'/thumbs/poeta_thumb.jpeg?id='.rand(0, 20);
        } 
        return $image;
    }
    
    static function getPathPortadaImageUser(){
        $user = Login::getUserSession();
        $id = $user->getId();
        $image = SD::getPathUpload(). '/imagens_'.$id.'/poeta_thumb.jpeg';
        //echo $image;
        if (!file_exists($image)) {
            $image = SD::getUrlUpload()."/imgteste.jpg";
        }else{
            $image = SD::getUrlUpload(). '/imagens_'.$id.'/poeta_thumb.jpeg?id='.rand(0, 20);
        } 
        return $image;
    }
    
    static function getPathMiniThumbImageUser() {
        $user = Login::getUserSession();
        $id = $user->getId();
        $image = SD::getPathUpload(). '/imagens_'.$id.'/thumbs/thumb36x36/poeta_thumb.jpeg';
        //echo $image;
        if (!file_exists($image)) {
            $image = SD::getUrlUpload()."/imgteste.jpg";
        }else{
            $image = SD::getUrlUpload(). '/imagens_'.$id.'/thumbs/thumb36x36/poeta_thumb.jpeg';
        } 
        return $image;
    }
    
    static function getPseudonimo() {
        $user = Login::getUserSession();
        return $user->pseudonimo;
    }
}

?>