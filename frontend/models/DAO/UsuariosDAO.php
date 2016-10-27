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
  
  function inserir(UsuariosModel $usuario){
       $db = $this->db;
       //var_dump($db);
      // var_dump($usuario);
       try {
           /* $sql = "INSERT INTO usuario(nome,sobrenome,email,nascimento,senha, status, pseudonimo) 
                 values(:nome,:sobrenome,:email, :nascimento,:senha, :status,:pseudonimo)
                 ";*/
           $sql = "INSERT INTO usuarios(nome,sobrenome,email, nascimento,senha, status, pseudonimo) 
                         values('".$usuario->getNome() ."','".$usuario->getSobrenome()."','".$usuario->getEmail()."','".$usuario->getNascimento()."','".$usuario->getSenha()."','". $usuario->getStatus() ."','".$usuario->getPseudonimo()."')
                 ";
             $result = $db->prepare($sql);
             //echo $registro = $result->execute();
             //die($sql);
             /*$result->bindValue(":nome",$usuario->getNome() , PDO::PARAM_STR);
             //var_dump($usuario->getNome());
             $result->bindValue(":sobrenome",$usuario->getSobrenome(),PDO::PARAM_STR);
             //var_dump($usuario->getSobrenome());
             $result->bindValue(":email",$usuario->getEmail(), PDO::PARAM_STR);
             //$result->bindValue(":imagem", $usuario->getImagem(), PDO::PARAM_STR);
             //echo date("Y-m-d", strtotime($usuario->getNascimento()));
            $result->bindValue(":nascimento", date("Y-m-d"), PDO::PARAM_STR);
             //var_dump($usuario->getNascimento());
             $result->bindValue(":senha", $usuario->getSenha(), PDO::PARAM_STR);
            // var_dump($usuario->getSenha());
            // $result->bindValue(":descricao", $usuario->getDescricao(), PDO::PARAM_STR);
             $result->bindValue(":status", $usuario->getStatus(), PDO::PARAM_INT);
            // var_dump($usuario->getStatus());
            $result->bindValue(":pseudonimo", $usuario->getPseudonimo(), PDO::PARAM_STR);
            //var_dump($usuario->getStatus());*/
             $registro = $result->execute();
             //var_dump($registro);
             if($registro){
                 return $db->lastInsertId();
             }else{
                 //throw new Exception("Não foi possivel inserir o usuário");
                 //var_dump($db->errorCode());
                 //throw new Exception();
             }
       }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        catch(Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }  
      return false;
  }
}


?>