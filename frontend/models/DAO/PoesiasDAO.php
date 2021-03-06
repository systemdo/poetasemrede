<?php

Class PoesiasDAO extends Model {

    function consultarTodosPoesias() {
        $query = "SELECT * FROM POESIAS";
        return $this->consultAll($query);
    }

    function obterPoesiasPorUsuario($idUsuario) {
        SD::loadModels('LikesPoesiasDAO', 'DAO');
        
        $collection = array();
        $query = "SELECT p.id as idPoesia, "
                . " p.idUsuario,titulo, "
                . "corpo, "
                . "dataCriacao, "
                . "lp.idPoesia as idPoesiaLikePoesia, "
                . "lp.id as idLikePoesia  "
                . "FROM POESIAS p "
                . " LEFT JOIN LIKES_POESIA lp on p.id=lp.idPoesia"
                . " WHERE p.idUsuario=$idUsuario "
                /*. " --AND lp.idUsuario=$idUsuario*/
                 ."  Order by dataCriacao DESC";
                 
        //die($query);
        $resultado = $this->consultAll($query);
        
        if (!empty($resultado)) {
            $like = new LikesPoesiasDAO();
            foreach ($resultado as $poesia) {
                $poesias = new PoesiasModel();
                $poesias->setId($poesia->idPoesia);
                $poesias->setTitulo($poesia->titulo);
                $poesias->setCorpo($poesia->corpo);
                $poesias->setDataCriacao($poesia->dataCriacao);
                $poesias->setIdUsuario($idUsuario);
                $poesias->setLike($like->obterLikePoesiaPorUsuario($poesia->idPoesia,$idUsuario));
                $poesias->setCountLike($like->obterQuantidadeLikesPorPoesia($poesia->idPoesia));
                
                array_push($collection, $poesias);
            }
        }
        
        return $collection;
    }
    
    function obterPoesia($id) {
        $query = "SELECT * FROM POESIAS WHERE id=$id ";
        return $this->consultOne($query);
    }

    function inserir(PoesiasModel $poesia) {
        $db = $this->db;
        try {
            $sql = "INSERT INTO poesias(titulo,corpo, dataCriacao, idUsuario,status) 
                 values(:titulo,:corpo, :dataCriacao ,:idUsuario, :status)
                 ";

            $insert = $db->prepare($sql);

            $insert->bindValue(":titulo", $poesia->getTitulo(), PDO::PARAM_STR);

            $insert->bindValue(":corpo", $poesia->getCorpo(), PDO::PARAM_STR);

            $insert->bindValue(":dataCriacao", date('Y-m-d h:i:s'), PDO::PARAM_STR);

            $insert->bindValue(":idUsuario", $poesia->getIdUsuario(), PDO::PARAM_INT);

            $insert->bindValue(":status", $poesia->getStatus(), PDO::PARAM_INT);

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

    function update(PoesiasModel $poesia) {
        $db = $this->db;
        try {
            $sql = "UPDATE POESIAS SET titulo = :titulo , corpo = :corpo, status = :status  WHERE id=:id ";

            $smt = $db->prepare($sql);
            
            $smt->bindValue(":id", $poesia->getId(), PDO::PARAM_INT);
            
            $smt->bindValue(":titulo", $poesia->getTitulo(), PDO::PARAM_STR);

            $smt->bindValue(":corpo", $poesia->getCorpo(), PDO::PARAM_STR);
            
            $smt->bindValue(":status", $poesia->getStatus(), PDO::PARAM_INT);

            $registro = $smt->execute();

            if ($registro) {
                return $poesia->getId();
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

    function delete($id) {
                $db = $this->db;

        try {
            $sql = "DELETE FROM POESIAS WHERE id= $id";
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