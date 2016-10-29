<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AmigosController extends Controller {

    function __construct() {
        $this->auth = true;
        parent::__construct();
        
    }

    function index() {
        $this->loadModels('RelacionamentosDAO', 'DAO');
        $this->loadModels("RelacionamentosModel");
        $relacionamento = new RelacionamentosModel();
        $relacionamentoDAO = new RelacionamentosDAO();
            
        $usuario = Login::getUserSession();
        $relacionamentos = $relacionamentoDAO->obterRelacionamentosPorUsuario( $usuario->getId());
        
        $this->view->setJs(array("poetas.js","ckeditor/ckeditor.js" , "poesias/poesias.js"));
        $this->view('index',array(
            'poesias' => $relacionamentos,
        ));
    }
    
    function htmlEditorRelacionamentos($id = false){
        $this->view->setLayout(false);
        
        $this->loadModels('RelacionamentosDAO', 'DAO');
        $this->loadModels("RelacionamentosModel");
        $relacionamento = new RelacionamentosModel();
        $relacionamentoDAO = new RelacionamentosDAO();
        if($id){
            $relacionamento = $relacionamentoDAO->obterPoesia($id);
        }
        $this->view->viewAjax('poesias/editor', array(
            'poesia' => $relacionamento,
        ));
    }
    
    function inserir() {
        //if (!empty($acao) and $acao == 'cadastrar-poesia') {
            $usuario = Login::getUserSession();
            $this->loadModels('RelacionamentosDAO', 'DAO');
            $this->loadModels("RelacionamentosModel");
            
            $validate = new Validate();
            $relacionamento = new RelacionamentosModel();
            
            $relacionamentoDAO = new RelacionamentosDAO();
            $resposta = true;
            $mensagem ="";
            
            $titulo = $_POST['titulo'];
            $relacionamento->setTitulo($titulo);
            
            $corpo= $_POST['corpo'];
            $relacionamento->setCorpo($corpo);
            
            $relacionamento->setIdUsuario($usuario->getId());
            $relacionamento->setStatus(2);
            
            $resposta = $relacionamentoDAO->inserir($relacionamento);
            
            if(!$resposta){
                $mensagem = "ocorreu um erro";
            }else{
                $mensagem = "Poesia ja no ponto";
                $resposta = true;
            }
            $this->getJson(array('resposta'=> $resposta, 'mensagem' => utf8_decode($mensagem)));
        //}
    }
    
    function delete($id){
        if (!empty($id)) {
                    $this->loadModels('RelacionamentosDAO', 'DAO');
            $relacionamentoDAO = new RelacionamentosDAO();
            if($relacionamentoDAO->delete($id)){
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