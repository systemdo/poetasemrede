<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserImage {

    const PATH_IMAGEM = 'uploads';

    protected $idUser;
    protected $path_user;
    protected $url_image_user;
    protected $extensions = array('png', 'jpg', 'jpeg');
    protected $nameImage;
    protected $typeImage;
    protected $sizeImage;
    protected $tmpImage;
    protected $errorImage;
    protected $widthThumbImg = 230;
    protected $heightThumbImg = 200;
    protected $sizeMinThumbImg = array('30', '30');

    function __construct($idUser) {
        $this->idUser = $idUser;
        $this->url_image_user = SD::getUrlUpload() . '/imagens_' . $this->idUser;
        $this->path_user = SD::getPathlUpload(). '/imagens_' . $this->idUser;
    }

    function getNameImage() {
        return $this->nameImage;
    }

    function getTypeImage() {
        return $this->typeImage;
    }

    function getSizeImage() {
        return $this->sizeImage;
    }

    function getTmpImage() {
        return $this->tmpImage;
    }

    function getErrorImage() {
        return $this->errorImage;
    }

    function setNameImage($nameImage) {
        $this->nameImage = $nameImage;
    }

    function setTypeImage($typeImage) {
        $type = explode("/", $typeImage);
        $this->typeImage = $type[1];
    }

    function setSizeImage($sizeImage) {
        $this->sizeImage = $sizeImage;
    }

    function setTmpImage($tmpImage) {
        $this->tmpImage = $tmpImage;
    }

    function setErrorImage($errorImage) {
        $this->errorImage = $errorImage;
    }

    function getUrlUserImage() {
        return $this->url_image_user;
    }

    function getPathUserImage() {
        return $this->path_user;
    }

    function getPathThumbsUserImage() {
        return $this->path_user;
    }

    function saveImage($destination = false) {
        if (!$destination) {
            $destination =  $this->getPathImgTpmUser();
        }
        try {
            if (!empty($this->tmpImage)) {
                if(!is_dir($destination)){
                    mkdir($destination);
                }
                //save in the temporary dir 
                return move_uploaded_file($this->tmpImage, $destination.'/'.$this->getNameImgApp());
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return false;
    }

    function getPathImgTpmApp() {
        return $this->path_user . "/tpm";
    }

    function uploadImageThumb() {
        $result = $this->saveImage($this->getPathImgTpmApp());
        if ($result) {
            $resizeResult = $this->resizeImg();
            if ($resizeResult) {
                var_dump(file_exists($this->getPathImgTpmApp().'/'.$this->getNameImgApp()));
                echo $this->getPathImgTpmApp().'/'.$this->getNameImgApp();
                echo $this->getPathUserImage().'/'.$this->getNameImgApp();
                $move = copy($this->getPathImgTpmApp().'/'.$this->getNameImgApp(), $this->getPathUserImage().'/'.$this->getNameImgApp());
                var_dump($move);
                $this->widthThumbImg = 36;
                $this->heightThumbImg = 36;
                $this->resizeImg();
                
                if(!is_dir($this->getPathThumb36x36ImgUser())){
                    mkdir($this->getPathThumb36x36ImgUser());
                }
                copy($this->getPathImgTpmApp().'/'.$this->getNameImgApp(), $this->getPathThumb36x36ImgUser().'/'.$this->getNameImgApp());
                //if ($move) {
                    //unlink($this->getPathImgTpmApp());
                //}
            }
        }
        return false;
    }

    function getPathThumbImgUser() {
        return $this->getPathUserImage() . "/thumbs";
    }
    
    function getPathThumb36x36ImgUser() {
        return $this->getPathThumbImgUser() . "/thumb36x36";
    }
    
    function checkExtention(){
        if(in_array($this->typeImage, $this->extensions)){
            return true;
        }
        return false;
    }
    
    function getNameImgApp(){
        return "poeta_thumb.".$this->typeImage;
    }
    
    function resizeImg(){
        $wideImg = WideImage::load($this->getPathImgTpmApp().'/'.$this->getNameImgApp());
        return $resizeResult = $wideImg->resize($this->widthThumbImg, $this->heightThumbImg);
    }
    
    function changeDirImg($path = false){
        if($path){
            
        } 
      
    }
    
    

}

?>
