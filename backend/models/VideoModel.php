<?php 

Class VideoModel extends Model{ 

private $id_video;

private $desc_video;

private $desc_url_video;

private $id_sistema;

function __construct(){ 
}

public function setId_video($id_video)
{

$this->id_video=$id_video;

}

public function getId_video()
{

return $this->id_video;

}

public function setDesc_video($desc_video)
{

$this->desc_video=$desc_video;

}

public function getDesc_video()
{

return $this->desc_video;

}

public function setDesc_url_video($desc_url_video)
{

$this->desc_url_video=$desc_url_video;

}

public function getDesc_url_video()
{

return $this->desc_url_video;

}

public function setId_sistema($id_sistema)
{

$this->id_sistema=$id_sistema;

}

public function getId_sistema()
{

return $this->id_sistema;

}


}


?>