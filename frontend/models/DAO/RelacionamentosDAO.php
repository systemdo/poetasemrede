<?php

Class RelacionamentosDAO extends Model {

    function consultarTodosRelacionamentos() {
        $query = "SELECT * FROM RELACIONAMENTOS";
        return $this->consultAll($query);
    }

    function obterRelacionamentosPorUsuario($idUsuario) {
        $query = "SELECT * FROM RELACIONAMENTOS WHERE idUsuario=$idUsuario Order by dataCriacao DESC";
        return $this->consultAll($query);
    }
    
    function obterPoesia($id) {
        $query = "SELECT * FROM RELACIONAMENTOS WHERE id=$id ";
        return $this->consultOne($query);
    }

    function inserir(RelacionamentosModel $relacionamento) {
        $db = $this->db;
        try {
            $sql = "INSERT INTO relacionamentos(titulo,corpo, dataCriacao, idUsuario,status) 
                 values(:titulo,:corpo, :dataCriacao ,:idUsuario, :status)
                 ";

            $insert = $db->prepare($sql);

            $insert->bindValue(":titulo", $relacionamento->getTitulo(), PDO::PARAM_STR);

            $insert->bindValue(":corpo", $relacionamento->getCorpo(), PDO::PARAM_STR);

            $insert->bindValue(":dataCriacao", date('Y-m-d h:i:s'), PDO::PARAM_STR);

            $insert->bindValue(":idUsuario", $relacionamento->getIdUsuario(), PDO::PARAM_INT);

            $insert->bindValue(":status", $relacionamento->getStatus(), PDO::PARAM_INT);

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

    function update(RelacionamentosModel $relacionamento) {
        $db = $this->db;
        try {
            $sql = "UPDATE RELACIONAMENTOS SET titulo = :titulo , corpo = :corpo, status = :status  WHERE id=:id ";

            $smt = $db->prepare($sql);
            
            $smt->bindValue(":id", $relacionamento->getId(), PDO::PARAM_INT);
            
            $smt->bindValue(":titulo", $relacionamento->getTitulo(), PDO::PARAM_STR);

            $smt->bindValue(":corpo", $relacionamento->getCorpo(), PDO::PARAM_STR);
            
            $smt->bindValue(":status", $relacionamento->getStatus(), PDO::PARAM_INT);

            $registro = $smt->execute();

            if ($registro) {
                return $relacionamento->getId();
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