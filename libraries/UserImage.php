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
        $this->typeImage = $typeImage;
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
        echo $destination;
        try {
            if (!empty($this->tmpImage)) {
                if(!dirname($destination)){
                    mkdir(dirname($destination));
                }
                return move_uploaded_file($this->tmpImage, $destination);
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
            $wideImg = WideImage::load($this->getPathImgTpmUser());
            $resizeResult = $wideImg->resize($this->widthThumbImg, $this->heightThumbImg);
            if ($resizeResult) {
                $move = move_uploaded_file($this->getPathImgTpmUser(), $this->getPathThumbsUserImage());
                if ($move) {
                    //unlink();
                }
            }
        }
        return false;
    }

    function getPathImgTpmUser() {
        return $this->getPathImgTpmApp() . "/thumb_img_" . $this->idUser;
    }

}

?>
