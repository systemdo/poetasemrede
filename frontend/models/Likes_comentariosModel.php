<?php 

Class Likes_comentariosModel extends Model{ 

private $id;

private $idComentario;

private $idUsuario;

private $dataLike;

function __construct(){ 
}

public function setId($id)
{

$this->id=$id;

}

public function getId()
{

return $this->id;

}

public function setIdComentario($idComentario)
{

$this->idComentario=$idComentario;

}

public function getIdComentario()
{

return $this->idComentario;

}

public function setIdUsuario($idUsuario)
{

$this->idUsuario=$idUsuario;

}

public function getIdUsuario()
{

return $this->idUsuario;

}

public function setDataLike($dataLike)
{

$this->dataLike=$dataLike;

}

public function getDataLike()
{

return $this->dataLike;

}


}


?>