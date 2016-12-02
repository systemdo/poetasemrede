<?php

Class LikesPoesiasDAO extends Model {

    function obterTodosLikesPorPoesia($idPoesia) {
        $query = "SELECT * FROM LIKES_POESIA where idPoesia=$idPoesia";
        return $this->consultAll($query);
    }

    function obterQuantidadeLikesPorPoesia($idPoesia) {
        $query = "SELECT count(*) as qtd FROM LIKES_POESIA where idPoesia=$idPoesia";
        $resultado = $this->consultOne($query);
        $qtd = 0 ;
        if($resultado){
            $qtd = $resultado->qtd;
        }
        
        return $qtd;
    }

    function obterLikePoesiaPorUsuario($idPoesia, $idUsuario) {
        $query = "SELECT * FROM LIKES_POESIA where idUsuario=$idUsuario AND idPoesia=$idPoesia";
        $result = $this->consultOne($query);
        return $result;
        
    }
    
    function obterUltimoLikePoesiaPorUsuario($idPoesia, $idUsuario) {
        $query = "SELECT max(id) as idlikepoesia FROM LIKES_POESIA where idUsuario=$idUsuario AND idPoesia=$idPoesia";
        $result = $this->consultOne($query);
        return $result;
        
    }

    function inserirLike(LikesPoesiasModel $likes) {
        $db = $this->db;

        try {
            $sql = "INSERT INTO lIKES_POESIA(idUsuario,idPoesia, dataLike) 
                 values(:idUsuario,:idPoesia, :dataLike)
                 ";
            /* var_dump($likes);    
              $sql ="INSERT INTO lIKES_POESIA(idUsuario,idPoesia)
              values(".$likes->getIdUsuario().",".$likes->getIdPoesia().")";

              die($sql); */
            $insert = $db->prepare($sql);

            $insert->bindValue(":idUsuario", $likes->getIdUsuario(), PDO::PARAM_INT);

            $insert->bindValue(":idPoesia", $likes->getIdPoesia(), PDO::PARAM_INT);
            
            $insert->bindValue(":dataLike", date('Y-m-d h:i:s'), PDO::PARAM_STR);

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

    function deleteLike($id) {
        $db = $this->db;

        try {
            $sql = "DELETE FROM LIKES_POESIA WHERE id= $id";
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