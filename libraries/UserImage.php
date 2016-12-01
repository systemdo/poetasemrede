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
    protected $extensions = array('jpg', 'jpeg');
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
        $this->path_user = SD::getPathUpload() . '/imagens_' . $this->idUser;
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
    protected function getPathImgTpmUser(){
        return $this->getPathUserImage.'/tpm';
    }
    

    function saveImage($destination = false) {
        if (!$destination) {
            $destination = $this->getPathImgTpmUser();
        }
        try {
            if ($this->checkExtention()) {
                if (!empty($this->tmpImage)){
                    //criar a  pasta do usuario dentro da pasta upload
                    if(!is_dir($this->getPathUserImage())){
                         mkdir($this->getPathUserImage());
                    }
                    //criarr pasta tpm
                    if (!is_dir($destination)){
                        mkdir($destination);
                    }
                    
                    //save in the temporary dir 
                    $result = move_uploaded_file($this->tmpImage, $destination . '/' . $this->getNameImgApp());
                    
                    return $result; 
                }
            } else {
                throw new Exception("Extenção não permitida");
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
        //save image pasta temporaria 
        $result = $this->saveImage($this->getPathImgTpmApp());

        if ($result) {
            //mudar o tamanho da imagem
            $resizeResult = $this->resizeImg();
            if ($resizeResult) {
                //criar a pasta thumb
               
                if (!is_dir($this->getPathThumbImgUser())) {
                    mkdir($this->getPathThumbImgUser());
                }
                //copiar a imagem da pasta tpm para thumb                     
                copy($this->getPathImgTpmApp() . '/' . $this->getNameImgApp(), $this->getPathThumbImgUser() . '/' . $this->getNameImgApp());
                
                //criar a pasta thumb36x36
                if (!is_dir($this->getPathThumb36x36ImgUser())) {
                    mkdir($this->getPathThumb36x36ImgUser());
                }

                $this->widthThumbImg = 36;
                $this->heightThumbImg = 36;
                $this->resizeImg();

                //copiar thumb36x36 da pasta tpm para a pasta  thumb36x36
                copy($this->getPathImgTpmApp() . '/' . $this->getNameImgApp(), $this->getPathThumb36x36ImgUser() . '/' . $this->getNameImgApp());
                
                //delete tpm
                $this->deleteFiles($this->getPathImgTpmApp());
                return true;
            }
        }else{
            throw new Exception("ocorreu um erro");
        }
        return false;
    }

    function getPathThumbImgUser() {
        return $this->getPathUserImage() . "/thumbs";
    }

    function getPathThumb36x36ImgUser() {
        return $this->getPathThumbImgUser() . "/thumb36x36";
    }

    function checkExtention() {
        if (in_array($this->typeImage, $this->extensions)) {
            return true;
        }
        return false;
    }

    function getNameImgApp() {
        return "poeta_thumb." . $this->typeImage;
    }

    function resizeImg($destination = false) {
        if (!$destination) {
            $destination = $this->getPathImgTpmApp() . '/' . $this->getNameImgApp();
        }
        $wideImg = WideImage::load($destination);
        return $resizeResult = $wideImg->resize($this->widthThumbImg, $this->heightThumbImg);
    }

    function deleteFiles($direction) {
        if (is_dir($direction)) {
            $files = array_diff(scandir($direction), array('.', '..'));
            if(!empty($files)){
                foreach ($files as $file) {
                    if (is_dir($file)) {
                        $this->deleteFiles($direction.'/'.$file);
                    } else {
                        unlink($direction.'/'.$file);
                    }
                }
                 rmdir($direction);
            }else{
                 rmdir($direction);
            }
        }
    }
    
    function createDir($dir, $nivel = true){
        if(!is_dir($dir)){
            if(is_dir(dirname($dir))){
                mkdir($dir);
            }else{
                $this->createDir(dirname($dir), $nivel);
            }       
        }
    }
    
    public static function getPathThumbImageUser(){
        ///uploads/imgteste.jpg
        $image = $this->getUrlUserImage() . '/thumbs/' . $this->getNameImgApp();
        if(file_exists($image)){
            return $image; 
        }
        return  SD::getUrlUpload()."/uploads/imgteste.jpg" ;
    }

}

?>
