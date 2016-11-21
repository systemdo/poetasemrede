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
        
    }

    function editar() {
        $this->loadModels('UsuariosDAO', 'DAO');
        $this->loadModels('UsuariosModel');

        $usuarioDAO = new UsuariosDAO();

        $usuarioSession = Login::getUserSession();
        $usuario = $usuarioDAO->consultarUsuario($usuarioSession->getId());

        $mensagem = $this->getSessionBag();

        $this->view('editar', array(
            'usuario' => $usuario,
            'mensagem' => $mensagem,
        ));
    }

    function cadastrarUsuarios($acao) {
        if (!empty($acao) and $acao == 'cadastrar-usuario') {

            $this->loadModels('UsuariosDAO', 'DAO');
            $this->loadModels("UsuariosModel");

            $validate = new Validate();
            $usuario = new UsuariosModel();

            $usuarioDAO = new UsuariosDAO();
            $resposta = true;
            $mensagem = "";

            //var_dump($_POST);
            $nome = $validate->isEmpty($_POST['nome']);
            if ($nome) {
                $usuario->setNome($nome);
            } else {
                $resposta = false;
                $mensagem = "O nome esá vazio";
            }

            $sobrenome = $validate->isEmpty($_POST['sobrenome']);
            if ($sobrenome) {
                $usuario->setSobrenome($sobrenome);
            } else {
                $resposta = false;
                $mensagem = "O Sobrenome está vazio";
            }

            $email = $validate->isEmail($_POST['email']);
            if ($email == $_POST['confirm_email']) {
                $usuario->setEmail($email);
            } else {
                $resposta = false;
                $mensagem = "Os emails estão diferentes";
            }

            $nascimento = $validate->isEmpty($_POST['nascimento-dia']);
            if ($nascimento) {
                $nascimento = $_POST['nascimento-ano'] . "-" . $_POST['nascimento-mes'] . "-" . $_POST['nascimento-dia'];
                $usuario->setNascimento($nascimento);
            }


            $senha = $validate->isEmpty($_POST['senha']);
            if ($senha == $_POST['confirm_senha']) {
                $usuario->setSenha(md5($senha));
            } else {
                $resposta = false;
                $mensagem = "As senhas estão diferentes";
            }

            $pseudonimo = $validate->isEmpty($_POST['pseudonimo']);
            if ($pseudonimo) {
                $usuario->setPseudonimo($pseudonimo);
            } else {
                $resposta = false;
                $mensagem = "O Pseudonimo está vazio";
            }

            $usuario->setStatus(2);
            if ($resposta) {
                if (!$usuarioDAO->inserir($usuario)) {
                    $resposta = false;
                }
            }

            /* $imagem = $validate->isEmpty($_POST['imagem']);
              if($imagem){
              $usuario->setNome($imagem);
              } */
        } else {
            $resposta = false;
        }
        $dados = array('resposta' => $resposta, 'mensagem' => utf8_encode($mensagem));
        $this->getJson($dados);
    }

    function EditarUsuarios() {
        $this->loadModels('UsuariosDAO', 'DAO');
        $this->loadModels("UsuariosModel");

        $validate = new Validate();
        $usuario = new UsuariosModel();

        $usuarioDAO = new UsuariosDAO();
        $resposta = true;

        $id = $validate->isEmpty($_POST['id']);
        if ($id) {
            $usuario->setId($id);
        } else {
            $resposta = false;
            $mensagem = "Sem identificação";
        }

        $nome = $validate->isEmpty($_POST['nome']);
        if ($nome) {
            $usuario->setNome($nome);
        } else {
            $resposta = false;
            $mensagem = "O nome esá vazio";
        }

        $sobrenome = $validate->isEmpty($_POST['sobrenome']);
        if ($sobrenome) {
            $usuario->setSobrenome($sobrenome);
        } else {
            $resposta = false;
            $mensagem = "O Sobrenome está vazio";
        }

        $nascimento = $validate->isEmpty($_POST['nascimento-dia']);
        if ($nascimento) {
            $nascimento = $_POST['nascimento-ano'] . "-" . $_POST['nascimento-mes'] . "-" . $_POST['nascimento-dia'];
            $usuario->setNascimento($nascimento);
        }

        $pseudonimo = $validate->isEmpty($_POST['pseudonimo']);
        if ($pseudonimo) {
            $usuario->setPseudonimo($pseudonimo);
        } else {
            $resposta = false;
            $mensagem = "O Pseudonimo está vazio";
        }


        if ($resposta) {
            if ($usuarioDAO->update($usuario)) {
                $resultado['editar']['resultado'] = true;
            } else {
                $resultado['editar']['resultado'] = false;
                $resultado['editar']['mensagem'] = "Não foi possível editar";
            }
        } else {
            $resultado['editar']['resultado'] = false;
            $resultado['editar']['mensagem'] = $mensagem;
        }

        $this->setSessionBag($resultado);
        SD::redirect('usuarios/editar');
        /* $imagem = $validate->isEmpty($_POST['imagem']);
          if($imagem){
          $usuario->setNome($imagem);
          } */
        //$dados = array('resposta' => $resposta, 'mensagem' => utf8_encode($mensagem));
        //$this->getJson($dados);
    }

    function imagemPerfil() {
        
        $this->loadModels('UsuariosDAO', 'DAO');
        $this->loadModels("UsuariosModel");
        $usuarioDAO = new UsuariosDAO();

        $usuarioSession = Login::getUserSession();
        $usuario = $usuarioDAO->consultarUsuario($usuarioSession->getId());

        $mensagem = $this->getSessionBag();

        $this->view('imagem_perfil', array(
            'usuario' => $usuario,
            'mensagem' => $mensagem,
        ));
    }

    function inserirImagemPerfil() {
        $this->loadLibraries('UserImage');
        $this->loadLibraries('WideImage', 'wideimage/lib');
    }

}

?>