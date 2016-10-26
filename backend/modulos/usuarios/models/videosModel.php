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

	function save_video($titulo,$url)
	{
		$date = date("Y-n-j H:i:s");
		$sql=	
			"INSERT INTO 
			videos(vi_titulo,vi_url, fecha)
			VALUES(:vi_titulo, :vi_url, :fecha)
			";
		$save = $this->db->prepare($sql);
		$save->bindValue(":vi_titulo", $titulo, PDO::PARAM_STR);
		$save->bindValue(":vi_url", $url, PDO::PARAM_STR);
		$save->bindValue(":fecha", $date, PDO::PARAM_STR);
		$result = $save->execute();
		$id=$this->db->lastInsertId();
		if($result)
		{
			return $id;
		}
		return $result;
	}
	function edit_video($id,$tittle,$url)
	{
		$date = date("Y-n-j H:i:s");
		$sql=	
		"UPDATE videos
		SET vi_titulo ='$tittle', vi_url ='$url', fecha ='$date'
		WHERE id ='$id' 
		";
		$save = $this->db->prepare($sql);
		$result = $save->execute();
		return $result;
	}


function delete_video($id)
{
	$result = $this->db->exec("DELETE FROM videos WHERE id='$id'");
	return $result;
}
	
	
}
?>
