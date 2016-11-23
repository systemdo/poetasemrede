<?php 

Class UsuariosDAO extends Model{ 

  function consultarTodosUsuarios(){
      $query = "SELECT * FROM USUARIOS";
      return $this->consultAll($query);
  }
  
  function consultarUsuario($idUsuario){
      $query = "SELECT * FROM USUARIOS WHERE id=$idUsuario";
      $result = $this->consultOne($query);
      $usuario = new UsuariosModel();
      if($result){
        $usuario->setId($result->id);
        $usuario->setNome($result->nome);
        $usuario->setSobrenome($result->sobrenome);
        $usuario->setPseudonimo($result->pseudonimo);
        $usuario->getEmail($result->id);
        $usuario->setImagem($result->imagem);
        $usuario->setNascimento($result->nascimento);
      }
      return $usuario;
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
  
  function update(UsuariosModel $usuario) {
        $db = $this->db;
        try {
            $sql = "UPDATE USUARIOS SET nome = :nome, sobrenome = :sobrenome, "
                    . " nascimento =:nascimento, pseudonimo = :pseudonimo"
                    . " WHERE id=:id ";

            $smt = $db->prepare($sql);
            
            $smt->bindValue(":id", $usuario->getId(), PDO::PARAM_INT);
            $smt->bindValue(":nome", $usuario->getNome(), PDO::PARAM_STR);
            $smt->bindValue(":sobrenome", $usuario->getSobrenome(), PDO::PARAM_STR);
            $smt->bindValue(":nascimento", $usuario->getNascimento(), PDO::PARAM_STR);
            $smt->bindValue(":pseudonimo", $usuario->getPseudonimo(), PDO::PARAM_STR);

            $registro = $smt->execute();
            if ($registro) {
                return $usuario->getId();
            } else {
                $e = new PDOException();
                throw new Exception($e->getMessage());
            }
        } catch (PDOException $e) {
            return  $e->getMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
        return false;
    }
    
    function imagemPerfil(UsuariosModel $usuario) {
        $db = $this->db;
        try {
            $sql = "UPDATE USUARIOS SET image = :image"
                    . " WHERE id=:id ";

            $smt = $db->prepare($sql);
            
            $smt->bindValue(":id", $usuario->getId(), PDO::PARAM_INT);
            $smt->bindValue(":image", $usuario->getImage(), PDO::PARAM_STR);
            
            $registro = $smt->execute();
            if ($registro) {
                return $usuario->getId();
            } else {
                $e = new PDOException();
                throw new Exception($e->getMessage());
            }
        } catch (PDOException $e) {
            return  $e->getMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
        return false;
    }

}


?>