<?php 

Class SistemaModel extends Model{ 

private $id_sistema;

private $desc_sistema;

private $desc_url_versao;

private $desc_url_manual;

private $id_cliente;

function __construct(){ 
}

public function setId_sistema($id_sistema)
{

$this->id_sistema=$id_sistema;

}

public function getId_sistema()
{

return $this->id_sistema;

}

public function setDesc_sistema($desc_sistema)
{

$this->desc_sistema=$desc_sistema;

}

public function getDesc_sistema()
{

return $this->desc_sistema;

}

public function setDesc_url_versao($desc_url_versao)
{

$this->desc_url_versao=$desc_url_versao;

}

public function getDesc_url_versao()
{

return $this->desc_url_versao;

}

public function setDesc_url_manual($desc_url_manual)
{

$this->desc_url_manual=$desc_url_manual;

}

public function getDesc_url_manual()
{

return $this->desc_url_manual;

}

public function setId_cliente($id_cliente)
{

$this->id_cliente=$id_cliente;

}

public function getId_cliente()
{

return $this->id_cliente;

}


}


?>