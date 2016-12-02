<?php

Class RelacionamentosDAO extends Model {

    function consultarTodosRelacionamentos() {
        $query = "SELECT * FROM RELACIONAMENTOS";
        return $this->consultAll($query);
    }

    function obterAmigosPorUsuarioPorIndex($idUsuario, $nome ,$status = false) {
         $query = "SELECT r.id, r.idConvidador, r.idConvidado "
                . " FROM USUARIOS u "
                . " JOIN RELACIONAMENTOS r "
                . " on r.idConvidador=u.id "
                . " OR r.idConvidado = u.id "
                . " WHERE u.id not in($idUsuario)"
                . " AND (r.idConvidador = $idUsuario or r.idConvidado= $idUsuario)"
                . " AND r.status =". StatusModel::STATUS_CONVITE_ACEITO
                . " AND (nome like '%" . $nome . "%' OR "
                . " pseudonimo = '%" . $nome . "%' )"
                . " Order by u.nome ASC ";

        
         
        $collection = array();
        $relacionamentos = $this->consultAll($query);
        $usuarioDAO = new UsuariosDAO();
       
        if (!empty($relacionamentos)) {
            foreach ($relacionamentos as $relacionamento) {
                $amigo = new RelacionamentosModel();
                $amigo->setId($relacionamento->id);
                $amigo->setIdConvidado($relacionamento->idConvidado);
                $amigo->setIdConvidador($relacionamento->idConvidador);
                $amigo->setStatus($relacionamento->idConvidador);
                if($relacionamento->idConvidador != $idUsuario){
                   $amigo->setAmigos($usuarioDAO->consultarUsuario($relacionamento->idConvidador)); 
                   $amigo->setConvidador($usuarioDAO->consultarUsuario($relacionamento->idConvidador));
                }
                if($relacionamento->idConvidado != $idUsuario){
                    $amigo->setAmigos($usuarioDAO->consultarUsuario($relacionamento->idConvidado)); 
                    $amigo->setConvidado($usuarioDAO->consultarUsuario($relacionamento->idConvidado));
                }
                
                
                array_push($collection, $amigo);
            }
        } 
        
        return $collection;       
    }
    function obterAmigosPorUsuarioPendentes($idUsuario) {
         SD::loadModels('UsuariosDAO', 'DAO');
        $query = "SELECT "
                . "r.id,"
                . "r.status ,idConvidador, idConvidado "
                . " FROM USUARIOS u "
                . " JOIN RELACIONAMENTOS r "
                . " on r.idConvidador=u.id "
                . " OR r.idConvidado = u.id "
                . " WHERE (r.idConvidador = $idUsuario or r.idConvidado= $idUsuario) "
                . " AND  u.id <> $idUsuario"
                . " AND r.status = ".StatusModel::STATUS_CONVITE_ENVIADO
                . " Order by nome ASC";
      
        //die($query);
        $collection = array();
        $relacionamentos = $this->consultAll($query);
        $usuarioDAO = new UsuariosDAO();
         if (!empty($relacionamentos)) {
            foreach ($relacionamentos as $relacionamento) {
                $amigo = new RelacionamentosModel();
                $amigo->setId($relacionamento->id);
                $amigo->setIdConvidado($relacionamento->idConvidado);
                $amigo->setIdConvidador($relacionamento->idConvidador);
                $amigo->setStatus($relacionamento->idConvidador);
                if($relacionamento->idConvidador != $idUsuario){
                   $amigo->setAmigos($usuarioDAO->consultarUsuario($relacionamento->idConvidador)); 
                   $amigo->setConvidador($usuarioDAO->consultarUsuario($relacionamento->idConvidador));
                }
                if($relacionamento->idConvidado != $idUsuario){
                    $amigo->setAmigos($usuarioDAO->consultarUsuario($relacionamento->idConvidado)); 
                    $amigo->setConvidado($usuarioDAO->consultarUsuario($relacionamento->idConvidado));
                }
                
                
                array_push($collection, $amigo);
            }
        } 
        //SD::printApp($collection);
        return $collection;       
       
       
    }

    function obterAmigosPorUsuarioPorLimite($idUsuario, $limit = false) {
        $query = "SELECT * FROM USUARIOS u "
                . " JOIN RELACIONAMENTOS r "
                . " on r.idConvidador=u.id "
                . " OR r.idConvidado = u.id "
                . " WHERE r.idConvidador = $idUsuario or r.idConvidado= $idUsuario"
                . " r.status = StatusModel::STATUS_CONVITE_ACEITO "
                . " Order by dataCriacao DESC "
                . " LIMIT $limit";
        return $this->consultAll($query);
    }

    function procurarAmigosPorIndex($idUsuario, $nome) {
        $query = "SELECT * FROM USUARIOS  "
                . " WHERE id <> $idUsuario "
                . " AND (nome like '%" . $nome . "%' OR "
                . " pseudonimo = '%" . $nome . "%' ) "
                . " Order by nome ASC";
//    die($query);id <> 4 AND (nome like '%lucas%' OR  pseudonimo = '%lucas%') 
        return $this->consultAll($query);
    }

    //saber quais os amigos de um usuário
    function obterAmigosPorUsuario($idUsuario) {
        $query = "SELECT r.id, r.idConvidador, r.idConvidado "
                . " FROM USUARIOS u "
                . " JOIN RELACIONAMENTOS r "
                . " on r.idConvidador=u.id "
                . " OR r.idConvidado = u.id "
                . " WHERE u.id not in($idUsuario)"
                . " AND (r.idConvidador = $idUsuario or r.idConvidado= $idUsuario)"
                . " AND r.status =". StatusModel::STATUS_CONVITE_ACEITO
                . " Order by nome ASC ";
        
        $collection = array();
        $relacionamentos = $this->consultAll($query);
        $usuarioDAO = new UsuariosDAO();
       
        if (!empty($relacionamentos)) {
            foreach ($relacionamentos as $relacionamento) {
                $amigo = new RelacionamentosModel();
                $amigo->setId($relacionamento->id);
                $amigo->setIdConvidado($relacionamento->idConvidado);
                $amigo->setIdConvidador($relacionamento->idConvidador);
                $amigo->setStatus($relacionamento->idConvidador);
                if($relacionamento->idConvidador != $idUsuario){
                   $amigo->setAmigos($usuarioDAO->consultarUsuario($relacionamento->idConvidador)); 
                   $amigo->setConvidador($usuarioDAO->consultarUsuario($relacionamento->idConvidador));
                }
                if($relacionamento->idConvidado != $idUsuario){
                    $amigo->setAmigos($usuarioDAO->consultarUsuario($relacionamento->idConvidado)); 
                    $amigo->setConvidado($usuarioDAO->consultarUsuario($relacionamento->idConvidado));
                }
                
                
                array_push($collection, $amigo);
            }
        }        
        return $collection;
    }

    function obterAmigosComConvitePendente($idUsuario) {
        $query = "SELECT * FROM RELACIONAMENTOS r "
                . " JOIN USUARIOS u on r.idUsuarioPrimeiro=u.idUsuario AND r.idUsuarioSegundo = u.idUsuario"
                . " WHERE idUsuarioPrimeiro = $idUsuario AND "
                . " idUsuarioSegundo = $idUsuario "
                . " and status = StatusModel::STATUS_CONVITE_ENVIADO Order by nome ASC";
        return $this->consultAll($query);
    }

    function obterRelacionamento($idUsuarioPrimeiro, $idUsuarioSegundo) {
        $query = "SELECT * FROM RELACIONAMENTOS WHERE id=$id ";
        return $this->consultOne($query);
    }

    function enviarConvite($idConvidador, $idConvidado) {
        $db = $this->db;
        if ($idConvidador > $idConvidado) {
            $idUsuarioPrimeiro = $idConvidado;
            $idUsuarioSegundo = $idConvidador;
        } else {
            $idUsuarioPrimeiro = $idConvidador;
            $idUsuarioSegundo = $idConvidado;
        }

        try {
            $sql = "INSERT INTO relacionamentos(idUsuarioPrimeiro,idUsuarioSegundo, idConvidador,idConvidado,status) 
                 values(:idUsuarioPrimeiro,:idUsuarioSegundo,:idConvidador,:idConvidado , :status)
                 ";

            $insert = $db->prepare($sql);

            $insert->bindValue(":idUsuarioPrimeiro", $idUsuarioPrimeiro, PDO::PARAM_INT);

            $insert->bindValue(":idUsuarioSegundo", $idUsuarioSegundo, PDO::PARAM_INT);

            $insert->bindValue(":idConvidador", $idConvidador, PDO::PARAM_INT);

            $insert->bindValue(":idConvidado", $idConvidado, PDO::PARAM_INT);

            $insert->bindValue(":status", StatusModel::STATUS_CONVITE_ENVIADO, PDO::PARAM_INT);

            $registro = $insert->execute();

            if ($registro) {
                return $db->lastInsertId();
            } else {
                $e = new PDOException();
                throw new Exception($e->getMessage());
            }
        } catch (PDOException $e) {
            echo 'Error: ' . print_r($e->getMessage());
        } catch (Exception $e) {
            echo 'Error: ' . print_r($e->getMessage());
        }
        return false;
    }

    function aceitarConvite($idRelacionamento) {
        $db = $this->db;
        try {
            $sql = "UPDATE RELACIONAMENTOS SET status = :status  WHERE id = :id";
            $smt = $db->prepare($sql);

            $smt->bindValue(":id", $idRelacionamento, PDO::PARAM_INT);
            $smt->bindValue(":status", StatusModel::STATUS_CONVITE_ACEITO, PDO::PARAM_INT);

            $registro = $smt->execute();

            if ($registro) {
                return true;
            } else {
                $e = new PDOException();
                throw new Exception($e->getMessage());
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return false;
    }

    function deleteAmigo($id) {
        $db = $this->db;

        try {
            $sql = "DELETE FROM RELACIONAMENTOS WHERE id= $id";
            $smt = $db->prepare($sql);
            return $registro = $smt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return false;
    }

    function verificarAmizadeVisitante($idUsuario, UserSystem $idUsuarioVisitante) {
        $idVisitante = $idUsuarioVisitante->getId();
        $query = "select r.`status`,
                  r.id as idRelacionamento,
                  uco.id as idConvidado,	
                  uco.nome as  nmConvidado,
                  uco.sobrenome as sbnmConvidado,
                  uco.pseudonimo as psConvidado,
                  ucr.id as idConvidador,	
                  ucr.nome as  nmConvidador,
                  ucr.sobrenome as sbnmConvidador,
                  ucr.pseudonimo as psConvidador
                  from relacionamentos r 
                  join usuarios ucr on r.idConvidador = ucr.id 
                  join usuarios uco on r.idConvidado = uco.id  
                  where (idConvidador = $idUsuario AND idConvidado = $idVisitante) 
                  or (idConvidador = $idVisitante AND idConvidado = $idUsuario)";
        return $this->consultOne($query);
    }
    
    function saberSeUsuarioConvidador($idConvidador, $idConvidado) {
       
        $query = "select * from relacionamentos
                  where idConvidador = $idConvidador "
                . " AND idConvidado = $idConvidado"; 
                  
        return !$this->consultOne($query)?false:true;
    }

}

?>