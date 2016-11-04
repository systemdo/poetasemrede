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
             
             //die($sql);
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