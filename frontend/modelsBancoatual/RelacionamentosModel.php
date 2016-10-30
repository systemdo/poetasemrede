<?php 

Class RelacionamentosModel extends Model{ 

private $id;

private $IdUsuarioPrimeiro;

private $idUsuarioSegundo;

private $status;

private $dataCriacao;

private $IdConvidador;

private $idConvidado;

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

public function setIdUsuarioPrimeiro($IdUsuarioPrimeiro)
{

$this->IdUsuarioPrimeiro=$IdUsuarioPrimeiro;

}

public function getIdUsuarioPrimeiro()
{

return $this->IdUsuarioPrimeiro;

}

public function setIdUsuarioSegundo($idUsuarioSegundo)
{

$this->idUsuarioSegundo=$idUsuarioSegundo;

}

public function getIdUsuarioSegundo()
{

return $this->idUsuarioSegundo;

}

public function setStatus($status)
{

$this->status=$status;

}

public function getStatus()
{

return $this->status;

}

public function setDataCriacao($dataCriacao)
{

$this->dataCriacao=$dataCriacao;

}

public function getDataCriacao()
{

return $this->dataCriacao;

}

public function setIdConvidador($IdConvidador)
{

$this->IdConvidador=$IdConvidador;

}

public function getIdConvidador()
{

return $this->IdConvidador;

}

public function setIdConvidado($idConvidado)
{

$this->idConvidado=$idConvidado;

}

public function getIdConvidado()
{

return $this->idConvidado;

}


}


?>