<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UserImage{
    
    const  PATH_IMAGEM = 'uploads';
    
    protected $idUser;
    
    protected $path_user;
    
    protected $url_image_user;
    
    function __construct($idUser) {
        $this->idUser = $idUser;
        $this->url_image_user = SD::getUrlUpload().'/imagens_'.$this->idUser;
        $this->path_user = SD::getPathlUpload() .'/'.PATH_IMAGEM.'/imagens_'.$this->idUser;
    }
    
    function getUrlUserImage(){
        return $this->url_image_user;
    }
    function getPathUserImage(){
        return $this->path_user;
    }
   
    
    
   
}
?>
