<?php

Class LikesComentariosDAO extends Model {

    function obterTodosLikesPorComentarios($idComentario) {
        $query = "SELECT * FROM LIKES_COMENTARIOS where idComentario=$idComentario";
        return $this->consultAll($query);
    }

    function obterQuantidadeLikesPorComentarios($idComentario) {
        $query = "SELECT count(*) as qtd FROM LIKES_COMENTARIOS where idComentario=$idComentario";
        $resultado = $this->consult($query);
        $qtd = 0 ;
        $resultado = $this->consultOne($query);
        if($resultado){
            $qtd = $resultado->qtd;
        }
        
        return $qtd;
    }
    
     function obterUltimoLikeComentarioPorUsuario($idComentario, $idUsuario) {
        $query = "SELECT max(id) as idLikeComentario FROM LIKES_COMENTARIOS where idUsuario=$idUsuario AND idComentario=$idComentario";
        $result = $this->consultOne($query);
        return $result;
        
    }

    function obterLikeComentariosPorUsuario($idComentario, $idUsuario) {
        $query = "SELECT * FROM LIKES_COMENTARIOS where idUsuario=$idUsuario AND idComentario=$idComentario";
        //die($query);
         $result = $this->consultOne($query);
        if($result){
           $result = $result->id;
        }        
        return $result;
    }

    function inserirLike(LikesComentariosModel $comentarios) {
        $db = $this->db;

        try {
            $sql = "INSERT INTO LIKES_COMENTARIOS(idUsuario,idComentario) 
                 values(:idUsuario,:idComentario)
                 ";
            $insert = $db->prepare($sql);

            $insert->bindValue(":idUsuario", $comentarios->getIdUsuario(), PDO::PARAM_INT);

            $insert->bindValue(":idComentario", $comentarios->getIdComentario(), PDO::PARAM_INT);

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
            $sql = "DELETE FROM LIKES_COMENTARIOS WHERE id= $id";
            $smt = $db->prepare($sql);
            //die($sql);
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