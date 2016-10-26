<?php 
Class videosModel extends Model
{


	function __construct()
	{
		parent::__construct();
	}
	
	function cath_videos($id)
	{
		$query = 
				"SELECT *
				FROM videos
				WHERE id='$id'
				";	
		$result = $this->consult($query);

		return $result;	
	}
	function all_videos()
	{
		$query = 
				"SELECT *
				FROM videos
				ORDER BY fecha DESC
				";	
		$result = $this->consultAll($query);

		return $result;	
	}


	function edit_video($id,$tittle,$url)
	{
		$sql=	
		"UPDATE videos
		SET vi_titulo ='$tittle', vi_url ='$url',
		WHERE id ='$id' 
		";
		$save = $this->db->prepare($sql);
		$result = $save->execute();
		return $result;
	}


function delete_video($id)
{
	 $this->db->exec("DELETE FROM videos WHERE id='$id'");
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

	function delete_event()
	{
		$id = $_POST['id'];
		$year = $this->year_by_id($id);
		$result = $this->db->exec("DELETE FROM event WHERE ev_id='$id'");
		return $result;
	}
	function delete_img($id)
	{
		$result = $this->db->exec("DELETE FROM img WHERE img_id='$id'");
		$url= M_PATH_IMG.'galeria/'.$year->ye_thumb;
		$this->borrarImg($url);
		$url= M_PATH_IMG.'galeria/thumbnail/'.$year->ye_thumb;
		$this->borrarImg($url);
		return $result;
	}
	function delete_event_id_year($id)
	{
		$result = $this->db->exec("DELETE FROM event WHERE ye_id='$id'");
		return $result;
	}
	function delete_img_id_event($id)
	{
		$imgs = $this->imgs_by_id_event($id);
		if($imgs != false)
		{
			foreach($imgs as $key => $img)
			{
				$this->delete_img($img->id);
				$url = M_PATH_IMG.'galeria/'.$img->img_name;
				$this->borrarImg($url);
				$url = M_PATH_IMG.'galeria/thumbnail/'.$img->img_name;
				$this->borrarImg($url);
			}
		}	
	}
	
	private function borrarImg($url)
	{
		@unlink($url);
	}	
}
?>
