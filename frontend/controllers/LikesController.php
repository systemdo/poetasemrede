<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LikesController extends Controller {

    function __construct() {
        $this->auth = true;
        parent::__construct();
    }

    function index() {

        $this->view->setJs(array("poetas.js", "ckeditor/ckeditor.js", "likes/likes.js"));
        /* $this->view('index', array(
          'relacionamentos' => $relacionamentos,
          )); */
    }

    function inserirLikesPoesias() {
        if (!empty($_POST['idPoesia'])) {
            $this->loadModels('LikesPoesiasDAO', 'DAO');
            $this->loadModels("LikesPoesiasModel");
            $likes = new LikesPoesiasModel();
            $likesDAO = new LikesPoesiasDAO();

            $usuario = Login::getUserSession();
            $likes->setIdPoesia($_POST['idPoesia']);
            $likes->setIdUsuario($usuario->getId());
            $resposta = $likesDAO->inserirLike($likes);
            if ($resposta) {
                $resposta = true;
                $mensagem = 'ok';
            } else {
                $resposta = false;
                $mensagem = 'not';
            }
            $idlikepoesia = $likesDAO->obterUltimoLikePoesiaPorUsuario($_POST['idPoesia'],$usuario->getId());
            $this->getJson(array('resposta' => $resposta,'idlikepoesia'=>$idlikepoesia->idlikepoesia , 'mensagem' => utf8_decode($mensagem)));
        } else {
            $this->getJson(array('resposta' => false, 'mensagem' => utf8_decode("Sem id")));
        }
    }

    function delete() {
        if (!empty($_POST['idLike'])) {
            $this->loadModels('LikesPoesiasDAO', 'DAO');
            $likesDAO = new LikesPoesiasDAO();

            if ($likesDAO->deleteLike($_POST['idLike'])) {
                $resposta = true;
                $mensagem = 'ok';
            } else {
                $resposta = false;
                $mensagem = 'not';
            };

            $this->getJson(array('resposta' => $resposta, 'mensagem' => utf8_decode($mensagem)));
        } else {
            $this->getJson(array('resposta' => false, 'mensagem' => utf8_decode("Sem id")));
        }
    }
    function inserirLikesComentarios() {
        if (!empty($_POST['idComentario'])) {
            $this->loadModels('LikesComentariosDAO', 'DAO');
            $this->loadModels("LikesComentariosModel");
            
            $comentarios = new LikesComentariosModel();
            $comentariosDAO = new LikesComentariosDAO();

            $usuario = Login::getUserSession();
            $comentarios->setIdComentario($_POST['idComentario']);
            $comentarios->setIdUsuario($usuario->getId());
            $resposta = $comentariosDAO->inserirLike($comentarios);
            if ($resposta) {
                $resposta = true;
                $mensagem = 'ok';
            } else {
                $resposta = false;
                $mensagem = 'not';
            }
            $this->getJson(array('resposta' => $resposta, 'mensagem' => utf8_decode($mensagem)));
        } else {
            $this->getJson(array('resposta' => false, 'mensagem' => utf8_decode("Sem id")));
        }
    }

    function deleteLikeComentarios() {
        if (!empty($_POST['idComentario'])) {
            $this->loadModels('LikesComentariosDAO', 'DAO');
            $likesDAO = new LikesPoesiasDAO();

            if ($likesDAO->deleteLike($_POST['idComentario'])) {
                $resposta = true;
                $mensagem = 'ok';
            } else {
                $resposta = false;
                $mensagem = 'not';
            };

            $this->getJson(array('resposta' => $resposta, 'mensagem' => utf8_decode($mensagem)));
        } else {
            $this->getJson(array('resposta' => false, 'mensagem' => utf8_decode("Sem id")));
        }
    }

}

?>