<?php 

Class StatusModel extends Model{ 

private $id;

private $status;

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

public function setStatus($status)
{

$this->status=$status;

}

public function getStatus()
{

return $this->status;

}


}


?>