<?php 
Class fotosModel extends Model
{
	
private $fotos;

	function __construct()
	{
		parent::__construct();
		$this->fotos= new Fotos();
	}
	
	function all_year()
	{	
		$query = $this->fotos->all_year();
		$result= $this->consultAll($query);
		return $result;
	}
	function verificar_year($name)
	{		
		$query = 
		"SELECT *
			FROM year 
		WHERE ye_year='$name'
		";	

		$result= $this->consultAll($query);
		return $result;
		
	}
	function year_by_id($id)
	{		
		$query = 
		"SELECT *
			FROM year 
		WHERE ye_id='$id'
		";	

		$result= $this->consult($query);
		return $result;
		
	}
	function imgs_by_id_event($id)
	{		
		$query = 
		"SELECT *
			FROM img 
		WHERE ev_id='$id'
		";	

		$result=$this->consultAll($query);
		return $result;
		
	}
	
	function all_event_by_id_year($id)
	{	
		$query = $this->fotos->all_event_by_id_year($id);
		$result= $this->consultAll($query);
		return $result;
	}
	
	function all_img_by_event($id)
	{	
		$query = $this->fotos->all_img_by_event($id);
		$result= $this->consultAll($query);
		return $result;
	}

	function event_by_id($event_id)
	{	
		;
		$query = 
			"SELECT *
			FROM event 
			WHERE ev_id = '$event_id'
			";	
		$result= $this->consult($query);	
		return $result;
	}

}
?>
