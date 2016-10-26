<?php 

Class Servico_clienteModel extends Model{ 

private $id_servico;

private $id_cliente;

private $fl_habilitado;

function __construct(){ 
}

public function setId_servico($id_servico)
{

$this->id_servico=$id_servico;

}

public function getId_servico()
{

return $this->id_servico;

}

public function setId_cliente($id_cliente)
{

$this->id_cliente=$id_cliente;

}

public function getId_cliente()
{

return $this->id_cliente;

}

public function setFl_habilitado($fl_habilitado)
{

$this->fl_habilitado=$fl_habilitado;

}

public function getFl_habilitado()
{

return $this->fl_habilitado;

}


}


?>