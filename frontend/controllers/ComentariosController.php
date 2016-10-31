<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ComentariosController extends Controller {

    function __construct() {
        $this->auth = true;
        parent::__construct();
    }

    function index() {

    }

    function inserir() {
        if (!empty($_POST['idPoesia'])) {
            $this->loadModels('ComentariosDAO', 'DAO');
            $this->loadModels("ComentariosModel");
            $comentario = new ComentariosModel();
            $comentarioDAO = new ComentariosDAO();

            $usuario = Login::getUserSession();
            
            $comentario->setIdPoesia($_POST['idPoesia']);
            $comentario->setIdUsuario($usuario->getId());
            $comentario->setComentario($_POST['comentario']);
            
            if(!empty($_POST['idComentarioResposta'])){
                if($_POST['idComentarioResposta'] != 'not'){
                    $comentario->setResposta($_POST['idComentarioResposta']);
                }else{
                    $comentario->setResposta(0);
                }
            }else{
                $comentario->setResposta(0);
            }
            
            $resposta = $comentarioDAO->inserir($comentario);
            
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
    
     function update($id) {
       if (!empty($id)) {
            $usuario = Login::getUserSession();
            $this->loadModels('ComentariosDAO', 'DAO');
            $this->loadModels("ComentariosModel");
        
            $comentario = new ComentariosModel();
            $comentario->setId($id);
         
            $comentarioDAO = new ComentariosDAO();
            $resposta = true;
            $mensagem = "";
            
            $corpo= $_POST['comentario'];
            $comentario->setComentario($corpo);
            
            
            $resposta = $comentarioDAO->update($comentario);
            
            if(!$resposta){
                $mensagem = "ocorreu um erro";
            }else{
                $mensagem = "Poesia ja no ponto";
                $resposta = true;
            }
            $this->getJson(array('resposta'=> $resposta, 'mensagem' => utf8_decode($mensagem)));
        }else{
                $this->getJson(array('resposta'=> false , 'mensagem' => utf8_decode("Sem id")));
        }
    }
   

    function delete() {
        if (!empty($_POST['idLike'])) {
            $this->loadModels('ComentariosDAO', 'DAO');
            $comentarioDAO = new ComentariosDAO();

            if ($comentarioDAO->deleteLike($_POST['idLike'])) {
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