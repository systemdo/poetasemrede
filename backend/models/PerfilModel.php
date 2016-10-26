<?php 

Class PerfilModel extends Model{ 

private $id;

private $perfil;

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

public function setPerfil($perfil)
{

$this->perfil=$perfil;

}

public function getPerfil()
{

return $this->perfil;

}


}


?>