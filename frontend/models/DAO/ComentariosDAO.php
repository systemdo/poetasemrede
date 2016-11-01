<?php

Class ComentariosDAO extends Model {

    function obterTodosComentarios() {
        $query = "SELECT * FROM COMENTARIOS";
        return $this->consultAll($query);
    }

    function obterComentariosPorPoesia($idPoesia) {
        $query = "SELECT c.id, comentario, resposta, dataCriacao, u.id as idUsuario, u.pseudonimo" 
                    ." FROM COMENTARIOS c" 
                   . " JOIN USUARIOS u" 
                    ." on c.idUsuario = u.id"
                ." WHERE idPoesia = $idPoesia "
                . " Order by dataCriacao ASC";
        //die($query);
        return $this->consultAll($query);
    }

   
    function inserir(ComentariosModel $comentarios) {
        $db = $this->db;
        try {
            $sql = "INSERT INTO COMENTARIOS (idUsuario,idPoesia, comentario,dataCriacao,resposta) 
                 values(:idUsuario,:idPoesia,:comentario, :dataCriacao, :resposta)
                 ";
            
             $insert = $db->prepare($sql);

           $insert = $db->prepare($sql);

            $insert->bindValue(":idUsuario", $comentarios->getIdUsuario(), PDO::PARAM_INT);

            $insert->bindValue(":idPoesia", $comentarios->getIdPoesia(), PDO::PARAM_INT);
            
            $insert->bindValue(":comentario", $comentarios->getComentario(), PDO::PARAM_STR);

            $insert->bindValue(":dataCriacao", date('Y-m-d h:i:s'), PDO::PARAM_STR);
            
            $insert->bindValue(":resposta", $comentarios->getResposta(), PDO::PARAM_INT);

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
    
    function update(ComentariosModel $comentario) {
        $db = $this->db;
        try {
            $sql = "UPDATE COMENTARIOS SET comentario = :comentario  WHERE id=:id ";

            $smt = $db->prepare($sql);
            
            $smt->bindValue(":id", $comentario->getId(), PDO::PARAM_INT);
            $smt->bindValue(":comentario", $comentario->getComentario(), PDO::PARAM_STR);

            $registro = $smt->execute();

            if ($registro) {
                return $comentario->getId();
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
            $sql = "DELETE FROM COMENTARIOS WHERE id = $id or resposta = $id";
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