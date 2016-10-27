<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuariosController extends Controller {

    function __construct() {
        //$this->auth = true;
        parent::__construct();
        
    }

    function index() {
        $this->view();
    }

    function cadastrarUsuarios($acao) {
        if (!empty($acao) and $acao == 'cadastrar-usuario') {
            
            $this->loadModels('UsuariosDAO', 'DAO');
            $this->loadModels("UsuariosModel");
            
            $validate = new Validate();
            $usuario = new UsuariosModel();
            
            $usuarioDAO = new UsuariosDAO();
            $erro = false;
            var_dump($_POST);
            $nome = $validate->isEmpty($_POST['nome']);
            if($nome){
                $usuario->setNome($nome);
            }
            
            $sobrenome= $validate->isEmpty($_POST['sobrenome']);
            if($sobrenome){
                $usuario->setSobrenome($sobrenome);
            }
            
            $email = $validate->isEmail($_POST['email']);
            if($email == $_POST['confirm_email']){
                $usuario->setEmail($email);
            }
            
            $nascimento = $validate->isEmpty($_POST['nascimento']);
            if($nascimento){
                $usuario->setNascimento($nascimento);
            }
            
            $descricao = $validate->isEmpty($_POST['nascimento']);
            if($descricao){
                $usuario->setDescricao($descricao);
            }
            
            $senha = $validate->isEmpty($_POST['password']);
            if($senha == $_POST['confirm_password']){
                $usuario->setSenha(md5($senha));
            }else{
                $resposta = false;
                $mensagem = "As senhas estão diferentes";
            }
            
            $pseudonimo = $validate->isEmpty($_POST['pseudonimo']);
            if($pseudonimo){
                $usuario->setPseudonimo($pseudonimo);
            }
            
            $usuario->setStatus(2);
            
            $usuarioDAO->inserir($usuario);

            /*$imagem = $validate->isEmpty($_POST['imagem']);
            if($imagem){
                $usuario->setNome($imagem);
            }*/
                            $resposta = false;

        }else{
            $resposta = false;
        }
        $dados = array('resposta' => $resposta);
        $this->getJson($dados);
    }

    

}

?>