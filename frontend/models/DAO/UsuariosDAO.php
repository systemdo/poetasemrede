<?php 

Class UsuariosDAO extends Model{ 

  function consultarTodosUsuarios(){
      $query = "SELECT * FROM USUARIOS";
      return $this->consultAll($query);
  }
  
  function verificarSeUsuarioExistePorEmail($email){
      $query = "SELECT * FROM USUARIOS WHERE=$email";
      return $this->consult($query);
  }
  
  function inserir(Usuario $usuario){
       $db = $this->db;
       $sql="INSERT INTO usuario (nome,sobrenome,email, imagem, nascimento, descricao, senha, status, pseudonimo) 
                    value(:nome,:sobrenome,:email,:imagem,:nascimento,:descricao, :senha, :status,:pseudonimo)
            ";
        $result = $db->prepare($sql);
        $result->bindValue(":nome",$usuario->getNome() , PDO::PARAM_STR);
        $result->bindValue(":sobrenome",$usuario->getSobrenome(), PDO::PARAM_STR);
        $result->bindValue(":email",$usuario->getEmail(), PDO::PARAM_STR);
        $result->bindValue(":imagem", $usuario->getImagem(), PDO::PARAM_STR);
        $result->bindValue(":nascimento", $usuario->getNascimento(), PDO::PARAM_STR);
        $result->bindValue(":senha", $usuario->getSenha(), PDO::PARAM_STR);
        $result->bindValue(":descricao", $usuario->getDescricao(), PDO::PARAM_STR);
        $result->bindValue(":status", $usuario->getStaus(), PDO::PARAM_STR);
        $result->bindValue(":pseudonimo", $usuario->getPseudonimo(), PDO::PARAM_STR);
        $registro = $result->execute();
        if($registro){
            return $db->lastInsertId();
        }else{
            throw new Exception("Não foi possivel inserir o usuário");
        }
      return false;
  }
}


?>