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
	
	function save_year($img, $titulo)
	{
		$sql=	
		"INSERT INTO 
		year(ye_year, ye_thumb)
		VALUES(:ye_year, :ye_thumb)
		";
		$save_event = $this->db->prepare($sql);
		$save_event->bindValue(":ye_year", $titulo, PDO::PARAM_STR);
		$save_event->bindValue(":ye_thumb", $img, PDO::PARAM_STR);
		$result = $save_event->execute();
		$id=$this->db->lastInsertId();
		if($result)
		{
			return $id;
		}
		return $result;
	}

	function save_event($event,$id_year)
	{
		$sql=	
		"INSERT INTO 
		event(ev_name,ye_id)
		VALUES(:ev_name, :ye_id)
		";
		$save_event = $this->db->prepare($sql);
		$save_event->bindValue(":ev_name", $event, PDO::PARAM_STR);
		$save_event->bindValue(":ye_id", $id_year, PDO::PARAM_STR);
		$result = $save_event->execute();
		$id=$this->db->lastInsertId();
		if($result)
		{
			return $id;
		}
		return $result;
	}
	function save_fotos($name,$id)
	{
		$date = date("Y-n-j H:i:s");
		$id_user = Login::get_id();
		var_dump($id_user);
		var_dump($date);
		var_dump($name);
		var_dump($id);
		$sql=	
		"INSERT INTO 
		event(img_name,ev_id, id_user, img_date)
		VALUES(:img_name, :ev_id, :id_user, :img_date)
		";
		$save_event = $this->db->prepare($sql);
		$save_event->bindValue(":img_name", $name, PDO::PARAM_STR);
		$save_event->bindValue(":ev_id", $id, PDO::PARAM_STR);
		$save_event->bindValue(":id_user", $id_user, PDO::PARAM_STR);
		$save_event->bindValue(":img_date", $date, PDO::PARAM_STR);
		$result = $save_event->execute();
		$id=$this->db->lastInsertId();
		if($result)
		{
			return $id;
		}
		return $result;
	}

	function delete_year()
	{
		$id = $_POST['id'];
		$year = $this->year_by_id($id);
		$result = $this->db->exec("DELETE FROM year WHERE id='$id'");
		$url= M_PATH_IMG.'galeria/year/'.$year->ye_thumb;
		@unlink($url);
		$url= M_PATH_IMG.'galeria/year/yearthumbnail/'.$year->ye_thumb;
		@unlink($url);
		return $result;
	}
	
		
}
?>
