<?php 
Class dashboardModel extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function home()
	{	
		$query = 
		"SELECT *
		FROM home
		ORDER BY fecha DESC 
		";	
		$result= $this->consultAll($query);
		//$result['count']=rowCount();
		return $result;
	}
	
	function home_id($id)
	{
		$query = 
		"SELECT *
		FROM home 
		WHERE id='$id'
		";	
		
		$result=$this->consult($query);
		return $result;
	}
	
	function crear_home($img,$titulo,$informe)
	{
		$sql="INSERT INTO home (img, titulo, informe, fecha) 
							value(:img,:titulo, :informe, :fecha)
								";
		$date = date('Y-m-d H:i:s');						
		$result = $this->db->prepare($sql);
		$result->bindValue(":img",$img , PDO::PARAM_STR);
		$result->bindValue(":titulo",$titulo, PDO::PARAM_STR);
		$result->bindValue(":informe",$informe, PDO::PARAM_STR);
		$result->bindValue(":fecha",$date, PDO::PARAM_STR);
		$registro = $result->execute();						
	}
	
	function editar_home($id,$titulo,$informe)
	{
		$sql="UPDATE home
		SET titulo ='$titulo', informe='$informe'
		WHERE id ='$id' 
		";
		
		$up = $this->db->prepare($sql);
		$result=$up->execute();
		
		return $result;
	}
	
		function activar_home($id)
		{
			$sql="UPDATE home
			SET status = 1
			WHERE id ='$id' 
			";
			
			$up = $this->db->prepare($sql);
			$result=$up->execute();
			
			return $result;
		}
	
	function desactivar_home($id)
	{
		$sql="UPDATE home
		SET status = 0
		WHERE id ='$id' 
		";
		
		$up = $this->db->prepare($sql);
		$result=$up->execute();
		
		return $result;
	}
	
	function activar_eventos($id)
	{
		$sql="UPDATE home
		SET is_event = 1
		WHERE id ='$id' 
		";
		
		$up = $this->db->prepare($sql);
		$result=$up->execute();
		
		return $result;
	}
	
	function desactivar_eventos($id)
	{
		$sql="UPDATE home
		SET is_event = 0
		WHERE id ='$id' 
		";
		
		$up = $this->db->prepare($sql);
		$result=$up->execute();
		
		return $result;
	}
	function delete_home($id)
	{
		$result = $this->db->exec("DELETE FROM home WHERE id='$id'");
		return $result;
	}
	
	
}
?>
