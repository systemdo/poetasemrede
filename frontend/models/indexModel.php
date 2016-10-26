<?php 
Class indexModel extends Model
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
		return $result;
	}
	
	
}
?>
