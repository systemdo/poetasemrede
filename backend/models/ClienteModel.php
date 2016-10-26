<?php 

Class ClienteModel extends Model{ 

private $id_cliente;

private $cod_cliente;

private $desc_nome_empresa;

private $desc_descricao_servico;

private $desc_caminho_logomarca;

private $desc_url_servicos;

function __construct(){ 
}

public function setId_cliente($id_cliente)
{

$this->id_cliente=$id_cliente;

}

public function getId_cliente()
{

return $this->id_cliente;

}

public function setCod_cliente($cod_cliente)
{

$this->cod_cliente=$cod_cliente;

}

public function getCod_cliente()
{

return $this->cod_cliente;

}

public function setDesc_nome_empresa($desc_nome_empresa)
{

$this->desc_nome_empresa=$desc_nome_empresa;

}

public function getDesc_nome_empresa()
{

return $this->desc_nome_empresa;

}

public function setDesc_descricao_servico($desc_descricao_servico)
{

$this->desc_descricao_servico=$desc_descricao_servico;

}

public function getDesc_descricao_servico()
{

return $this->desc_descricao_servico;

}

public function setDesc_caminho_logomarca($desc_caminho_logomarca)
{

$this->desc_caminho_logomarca=$desc_caminho_logomarca;

}

public function getDesc_caminho_logomarca()
{

return $this->desc_caminho_logomarca;

}

public function setDesc_url_servicos($desc_url_servicos)
{

$this->desc_url_servicos=$desc_url_servicos;

}

public function getDesc_url_servicos()
{

return $this->desc_url_servicos;

}


}


?>