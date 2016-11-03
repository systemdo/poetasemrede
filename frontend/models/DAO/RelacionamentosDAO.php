<?php

Class RelacionamentosDAO extends Model {

    function consultarTodosRelacionamentos() {
        $query = "SELECT * FROM RELACIONAMENTOS";
        return $this->consultAll($query);
    }

    function obterAmigosPorUsuarioPorIndex($idUsuario,$nome) {
        $query = "SELECT * FROM USUARIOS u "
                . " JOIN RELACIONAMENTOS r "
                . " on r.idConvidador=u.id "
                . " OR r.idConvidado = u.id "
                . " WHERE r.idConvidador = $idUsuario or r.idConvidado= $idUsuario"
                . " AND nome like '%" . $nome . "%' OR "
                . " pseudonimo = '%".$nome."%' "
                . "r.status = StatusModel::STATUS_CONVITE_ACEITO Order by nome ASC";
        return $this->consultAll($query);
    }
    
    function obterAmigosPorUsuarioPorLimite($idUsuario,$limit) {
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
    
    function procurarAmigosPorIndex($nome) {
         $query = "SELECT * FROM USUARIOS  "
                . " WHERE nome like '%" . $nome . "%' OR "
                . " pseudonimo = '%".$nome."%' Order by nome ASC";
      // die($query);
        return $this->consultAll($query);
    }

    //saber quais os amigos de um usuário
    function obterAmigosPorUsuario($idUsuario) {
        $query = "SELECT * FROM RELACIONAMENTOS r "
                . " JOIN USUARIOS u on r.idUsuarioPrimeiro=u.idUsuario AND r.idUsuarioSegundo = u.idUsuario"
                . " WHERE idUsuarioPrimeiro = $idUsuario AND "
                . " idUsuarioSegundo = $idUsuario "
                . " and status <> StatusModel::STATUS_CONVITE_ENVIADO Order by nome ASC";
        return $this->consultAll($query);
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
        
        if($idConvidador > $idConvidado){
            $idUsuarioPrimeiro = $idConvidado;
            $idUsuarioSegundo = $idConvidador;
        }else{
            $idUsuarioPrimeiro = $idConvidador;
            $idUsuarioSegundo = $idConvidado;
        }
        
        try {
            $sql = "INSERT INTO relacionamentos(idUsuarioPrimeiro,idUsuarioSegundo, idConvidador,idConvidado,status) 
                 values(:idUsuarioPrimeiro,:idUsuarioSegundo,:idConvidador,:idConvidado, :dataCriacao , :status)
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
            echo 'Error: ' . $e->getMessage();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
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

}

?>