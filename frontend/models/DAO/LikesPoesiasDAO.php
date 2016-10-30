<?php

Class LikesPoesiasDAO extends Model {

    function obterTodosLikesPorPoesia($idPoesia) {
        $query = "SELECT * FROM LIKES_POESIA where idPoesia=$idPoesia";
        return $this->consultAll($query);
    }

    function obterQuantidadeLikesPorPoesia($idPoesia) {
        $query = "SELECT count(*) FROM LIKES_POESIA where idPoesia=$idPoesia";
        return $this->consultAll($query);
    }

    function obterLikePoesiaPorUsuario($idPoesia, $idUsuario) {
        $query = "SELECT * FROM LIKES_POESIA where idUsuario=$idUsuario AND idPoesia=$idPoesia";
        return $this->consultOne($query);
    }

    function inserirLike(LikesPoesiasModel $likes) {
        $db = $this->db;

        try {
            $sql = "INSERT INTO lIKES_POESIA(idUsuario,idPoesia) 
                 values(:idUsuario,:idPoesia)
                 ";
            /* var_dump($likes);    
              $sql ="INSERT INTO lIKES_POESIA(idUsuario,idPoesia)
              values(".$likes->getIdUsuario().",".$likes->getIdPoesia().")";

              die($sql); */
            $insert = $db->prepare($sql);

            $insert->bindValue(":idUsuario", $likes->getIdUsuario(), PDO::PARAM_INT);

            $insert->bindValue(":idPoesia", $likes->getIdPoesia(), PDO::PARAM_INT);

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