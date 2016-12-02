<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PoesiasController extends Controller {

    function __construct() {
        $this->auth = true;
        parent::__construct();
        
    }

    function index() {
        $this->loadModels('LikesComentariosDAO', 'DAO');
        $this->loadModels('LikesPoesiasDAO', 'DAO');
        $this->loadModels("PoesiasModel");
        $this->loadModels('PoesiasDAO', 'DAO');
     
        
        $this->loadModels('ComentariosDAO', 'DAO');
        
        $like = new LikesPoesiasDAO();
        $poesia = new PoesiasModel();
        $poesiaDAO = new PoesiasDAO();
            
        $usuario = Login::getUserSession();
        
        $poesias = $poesiaDAO->obterPoesiasPorUsuario( $usuario->getId());
        
        $comentarios = new ComentariosDAO(); 
        
        
        //$this->view->setJs(array("poetas.js","ckeditor/ckeditor.js" , "poesias/poesias.js"));
        $this->view('index',array(
            'poesias' => $poesias,
            'comentarios'=> $comentarios,
        ));
    }
    
    function htmlEditorPoesias($id = false){
        $this->view->setLayout(false);
        
        $this->loadModels('PoesiasDAO', 'DAO');
        $this->loadModels("PoesiasModel");
        $poesia = new PoesiasModel();
        $poesiaDAO = new PoesiasDAO();
        if($id){
            $poesia = $poesiaDAO->obterPoesia($id);
        }
        $this->view->viewAjax('poesias/editor', array(
            'poesia' => $poesia,
        ));
    }
    
    function inserir() {
        //if (!empty($acao) and $acao == 'cadastrar-poesia') {
            $usuario = Login::getUserSession();
            $this->loadModels('PoesiasDAO', 'DAO');
            $this->loadModels("PoesiasModel");
            
            $validate = new Validate();
            $poesia = new PoesiasModel();
            
            $poesiaDAO = new PoesiasDAO();
            $resposta = true;
            $mensagem ="";
            
            $titulo = $_POST['titulo'];
            $poesia->setTitulo($titulo);
            
            $corpo= $_POST['corpo'];
            $poesia->setCorpo($corpo);
            
            $poesia->setIdUsuario($usuario->getId());
            $poesia->setStatus(2);
            
            $resposta = $poesiaDAO->inserir($poesia);
            
            if(!$resposta){
                $mensagem = "ocorreu um erro";
            }else{
                $mensagem = "Poesia ja no ponto";
                $resposta = true;
            }
            $this->getJson(array('resposta'=> $resposta, 'mensagem' => utf8_decode($mensagem)));
        //}
    }
    function update($id) {
       if (!empty($id)) {
            $usuario = Login::getUserSession();
            $this->loadModels('PoesiasDAO', 'DAO');
            $this->loadModels("PoesiasModel");
        
            $poesia = new PoesiasModel();
            $poesia->setId($id);
         
            $poesiaDAO = new PoesiasDAO();
            $resposta = true;
            $mensagem = "";
            
            $titulo = $_POST['titulo'];
            $poesia->setTitulo($titulo);
            
            $corpo= $_POST['corpo'];
            $poesia->setCorpo($corpo);
            
            
            if(!empty($_POST['status'])){
                $poesia->setStatus($_POST['status']);
            }
            $resposta = $poesiaDAO->update($poesia);
            
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
    
    function delete($id){
        if (!empty($id)) {
                    $this->loadModels('PoesiasDAO', 'DAO');
            $poesiaDAO = new PoesiasDAO();
            if($poesiaDAO->delete($id)){
                $resposta = true;
                $mensagem = 'Excluido com sucesso';
            }else{
                $resposta = false;
                $mensagem = 'Não foi possivel excluir';
            };
            
         $this->getJson(array('resposta'=> $resposta, 'mensagem' => utf8_decode($mensagem)));   
        }else{
            $this->getJson(array('resposta'=> false , 'mensagem' => utf8_decode("Sem id")));
        }    
    }
    

}

?>