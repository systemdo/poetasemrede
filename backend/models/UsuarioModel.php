<?php 

Class UsuarioModel extends Model{ 

private $id_usuario;

private $cod_usuario;

private $desc_email;

private $id_cliente;

private $name;

private $username;

private $auth_key;

private $password_hash;

private $password_reset_token;

private $email;

private $status;

private $created_at;

private $perfil;

function __construct(){ 
}

public function setId_usuario($id_usuario)
{

$this->id_usuario=$id_usuario;

}

public function getId_usuario()
{

return $this->id_usuario;

}

public function setCod_usuario($cod_usuario)
{

$this->cod_usuario=$cod_usuario;

}

public function getCod_usuario()
{

return $this->cod_usuario;

}

public function setDesc_email($desc_email)
{

$this->desc_email=$desc_email;

}

public function getDesc_email()
{

return $this->desc_email;

}

public function setId_cliente($id_cliente)
{

$this->id_cliente=$id_cliente;

}

public function getId_cliente()
{

return $this->id_cliente;

}

public function setName($name)
{

$this->name=$name;

}

public function getName()
{

return $this->name;

}

public function setUsername($username)
{

$this->username=$username;

}

public function getUsername()
{

return $this->username;

}

public function setAuth_key($auth_key)
{

$this->auth_key=$auth_key;

}

public function getAuth_key()
{

return $this->auth_key;

}

public function setPassword_hash($password_hash)
{

$this->password_hash=$password_hash;

}

public function getPassword_hash()
{

return $this->password_hash;

}

public function setPassword_reset_token($password_reset_token)
{

$this->password_reset_token=$password_reset_token;

}

public function getPassword_reset_token()
{

return $this->password_reset_token;

}

public function setEmail($email)
{

$this->email=$email;

}

public function getEmail()
{

return $this->email;

}

public function setStatus($status)
{

$this->status=$status;

}

public function getStatus()
{

return $this->status;

}

public function setCreated_at($created_at)
{

$this->created_at=$created_at;

}

public function getCreated_at()
{

return $this->created_at;

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