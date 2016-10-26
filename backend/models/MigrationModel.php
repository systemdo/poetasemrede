<?php 

Class MigrationModel extends Model{ 

private $version;

private $apply_time;

function __construct(){ 
}

public function setVersion($version)
{

$this->version=$version;

}

public function getVersion()
{

return $this->version;

}

public function setApply_time($apply_time)
{

$this->apply_time=$apply_time;

}

public function getApply_time()
{

return $this->apply_time;

}


}


?>