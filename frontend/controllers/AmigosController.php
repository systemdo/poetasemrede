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
        $this->loadModels("UsuariosDAO", 'DAO');
        
        $this->loadModels("StatusModel");
        $this->loadModels("UsuariosModel");
        //$relacionamento = new RelacionamentosModel();
        $relacionamentoDAO = new RelacionamentosDAO();

        $usuario = Login::getUserSession();
        $relacionamentos = $relacionamentoDAO->obterAmigosPorUsuario($usuario->getId());
        $pendentes = $relacionamentoDAO->obterAmigosPorUsuarioPendentes($usuario->getId());
        //SD::printApp($relacionamentos);
        $this->view->setJs(array("poetas.js", "ckeditor/ckeditor.js", "amigos/amigos.js"));
        $this->view('index', array(
            'relacionamentos' => $relacionamentos,
            'pendentes' => $pendentes,
        ));
    }

    function verAmigosHtml($id) {
        $this->loadModels('RelacionamentosDAO', 'DAO');
        $this->loadModels("UsuariosModelDAO", 'DAO');

        $this->loadModels("RelacionamentosModel");
        $this->loadModels("StatusModel");
        $this->loadModels("UsuariosModel");
        $relacionamentoDAO = new RelacionamentosDAO();

        $this->view->setLayout(false);

        $usuario = Login::getUserSession();
        if ($id) {
            $relacionamentos = $relacionamentoDAO->obterAmigosPorUsuario($id);
        }
       //s SD::printApp($relacionamentos);
        $this->view->viewAjax('amigos/verAmigos', array(
            'relacionamentos' => $relacionamentos,
        ));
    }

    function procurarAmigosHtml($nome, $status = false) {
        $this->loadModels('RelacionamentosDAO', 'DAO');
        $this->loadModels("UsuariosDAO", 'DAO');
        $this->loadModels("RelacionamentosModel");
        $this->loadModels("StatusModel");
        $this->loadModels("UsuariosModel");

        $relacionamento = new RelacionamentosModel();
        $relacionamentoDAO = new RelacionamentosDAO();

        $this->view->setLayout(false);

        $usuario = Login::getUserSession();
  
        //if($status == StatusModel::STATUS_CONVITE_ACEITO){
        $relacionamentos = $relacionamentoDAO->obterAmigosPorUsuarioPorIndex($usuario->getId(), $nome, $status);
        /* }else{
          //lista de todos os relacionamentos
          $relacionamentos = $relacionamentoDAO->procurarAmigosPorIndex($usuario->getId(),$nome);

          } */
        
       
        $this->view->viewAjax('amigos/verAmigos', array(
            'relacionamentos' => $relacionamentos,
        ));
    }

    function procurarAmigosPedentesHtml() {
        $this->loadModels('RelacionamentosDAO', 'DAO');
        $this->loadModels("RelacionamentosModel");
        $this->loadModels("StatusModel");
        $this->loadModels("UsuariosModel");
        $relacionamento = new RelacionamentosModel();
        $relacionamentoDAO = new RelacionamentosDAO();

        $this->view->setLayout(false);

        $usuario = Login::getUserSession();

        $relacionamentos = $relacionamentoDAO->obterAmigosPorUsuarioPendentes($usuario->getId());
        
        $this->view->viewAjax('amigos/verAmigosPendentes', array(
            'relacionamentos' => $relacionamentos,
        ));
    }

    function delete($id) {
        if (!empty($id)) {
            $this->loadModels('RelacionamentosDAO', 'DAO');
            $relacionamentoDAO = new RelacionamentosDAO();
            if ($relacionamentoDAO->delete($id)) {
                $resposta = true;
                $mensagem = 'Excluido com sucesso';
            } else {
                $resposta = false;
                $mensagem = 'Não foi possivel excluir';
            };

            $this->getJson(array('resposta' => $resposta, 'mensagem' => utf8_decode($mensagem)));
        } else {
            $this->getJson(array('resposta' => false, 'mensagem' => utf8_decode("Sem id")));
        }
    }

    function enviarConvite() {
        $this->loadModels('RelacionamentosDAO', 'DAO');
        $this->loadModels("StatusModel");
        $this->view->setLayout(false);

        $usuario = Login::getUserSession();
        if (!empty($_POST['idConvidado'])) {
            $this->loadModels('RelacionamentosDAO', 'DAO');
            $relacionamentoDAO = new RelacionamentosDAO();
            if ($relacionamentoDAO->enviarConvite($usuario->getId(), $_POST['idConvidado'])) {
                $resposta = true;
                $mensagem = 'Amizade com sucesso';
            } else {
                $resposta = false;
                $mensagem = 'Não foi possivel';
            };

            $this->getJson(array('resposta' => $resposta, 'mensagem' => utf8_decode($mensagem)));
        } else {
            $this->getJson(array('resposta' => false, 'mensagem' => utf8_decode("Sem id")));
        }
    }

    function aceitarConvite() {
        $this->loadModels('RelacionamentosDAO', 'DAO');
        $this->loadModels("StatusModel");
        $this->view->setLayout(false);

        $usuario = Login::getUserSession();
        if (!empty($_POST['idRelacionamento'])) {
            $this->loadModels('RelacionamentosDAO', 'DAO');
            $relacionamentoDAO = new RelacionamentosDAO();
            if ($relacionamentoDAO->aceitarConvite($_POST['idRelacionamento'])) {
                $resposta = true;
                $mensagem = 'Aceito com sucesso';
            } else {
                $resposta = false;
                $mensagem = 'Não foi possivel';
            };

            $this->getJson(array('resposta' => $resposta, 'mensagem' => utf8_decode($mensagem)));
        } else {
            $this->getJson(array('resposta' => false, 'mensagem' => utf8_decode("Sem id")));
        }
    }
    function procurarNovosAmigosHtml($nome, $status = false) {
        $this->loadModels('RelacionamentosDAO', 'DAO');
        $this->loadModels("UsuariosDAO", 'DAO');
        $this->loadModels("RelacionamentosModel");
        $this->loadModels("StatusModel");
        $this->loadModels("UsuariosModel");

        $relacionamento = new RelacionamentosModel();
        $relacionamentoDAO = new RelacionamentosDAO();
        $usuarioDAO = new UsuariosDAO();
        $this->view->setLayout(false);

        $usuario = Login::getUserSession();

        //if($status == StatusModel::STATUS_CONVITE_ACEITO){
        $relacionamentos = $usuarioDAO->procurarUsuario($usuario->getId(), $nome);
        /* }else{
          //lista de todos os relacionamentos
          $relacionamentos = $relacionamentoDAO->procurarAmigosPorIndex($usuario->getId(),$nome);

          } */
        $this->view->viewAjax('amigos/procurarAmigos', array(
            'relacionamentos' => $relacionamentos,
        ));
    }


}

?>