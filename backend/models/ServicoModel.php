<?php 

Class ServicoModel extends Model{ 

private $id_servico;

private $desc_servico;

private $desc_wsdl_servico;

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

public function setDesc_servico($desc_servico)
{

$this->desc_servico=$desc_servico;

}

public function getDesc_servico()
{

return $this->desc_servico;

}

public function setDesc_wsdl_servico($desc_wsdl_servico)
{

$this->desc_wsdl_servico=$desc_wsdl_servico;

}

public function getDesc_wsdl_servico()
{

return $this->desc_wsdl_servico;

}


}


?>