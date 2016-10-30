<?php 

Class ComentariosModel extends Model{ 

private $id;

private $comentarios;

private $resposta;

private $usuario;

private $poesia;

private $dataInserido;

private $dataUpdate;

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

public function setComentarios($comentarios)
{

$this->comentarios=$comentarios;

}

public function getComentarios()
{

return $this->comentarios;

}

public function setResposta($resposta)
{

$this->resposta=$resposta;

}

public function getResposta()
{

return $this->resposta;

}

public function setUsuario($usuario)
{

$this->usuario=$usuario;

}

public function getUsuario()
{

return $this->usuario;

}

public function setPoesia($poesia)
{

$this->poesia=$poesia;

}

public function getPoesia()
{

return $this->poesia;

}

public function setDataInserido($dataInserido)
{

$this->dataInserido=$dataInserido;

}

public function getDataInserido()
{

return $this->dataInserido;

}

public function setDataUpdate($dataUpdate)
{

$this->dataUpdate=$dataUpdate;

}

public function getDataUpdate()
{

return $this->dataUpdate;

}


}


?>