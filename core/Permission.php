<?php
Class Permission
{
private $admin;
private $cliente;
private $ctp;
private $date;
private $db;

function __construct()
{
	$this->db = DB_Patricios::connect();
	$this->set_admin();
	$this->set_cliente();
	$this->set_ctp();
	

} 

private function generete_token()
{
	$letter = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','P','Q','R','S','T','U','V','X','W','Y','Z','Ñ');
	//$letter = shuffle($letter); 
	$letter =  array_rand($letter, 7);
	$result = '';
	foreach($letter as $key => $value)
	{
		$result.=$value;
	}
	$uniqid = uniqid(rand(10000000000,999999999999), true);
	$token = md5($result.$uniqid);
	return $token;
}

function set_admin()
{
	$this->admin = $this->generete_token();
	$type = 'admin';
	//$this->save_data_base($type,$this->admin);
}  
function set_cliente()
{
	$this->cliente = $this->generete_token();
	$type = 'cliente';
	//$this->save_data_base($type,$this->cliente);
}  
function set_ctp()
{
	$this->ctp = $this->generete_token();
	$type = 'ctp';
	//$this->save_data_base($type,$this->ctp);
}  
function save_data_base($type,$token)
{
	 $date = date("Y-n-j");
	 $sql=	
		"INSERT INTO 
		permission(per_token,per_type,per_date)
		VALUES(:per_token,:per_type,:per_date)
		";
		
		$save_permission = $this->db->prepare($sql);
		$save_permission->bindValue(":per_token",$token, PDO::PARAM_STR);
		$save_permission->bindValue(":per_type",$type, PDO::PARAM_STR);
		$save_permission->bindValue(":per_date",$date, PDO::PARAM_STR);
		$result=$save_permission->execute();
		if(!$result)
		{
			echo 'no insert token';
			die();
			return false;
		}
}

function change_token_week()
{
    $query = 
			"SELECT per_date
			FROM permission
			WHERE per_type= 'admin'
			";
			
		$consulta = $this->db->prepare($query); 
		$consulta->execute();
		$result = $consulta->fetch(PDO::FETCH_ASSOC);
	if(!$result)
	{
		die('problemas permission 89');
	}
	$what_day = $result['per_date'];
	$week = explode("-",$what_day);
	$one_week = (int)$week[2]+1;
	$one_week = $week[0].'-'.$week[1].'-'.$one_week;
	$one_week = strtotime($one_week);
	$today = strtotime(date("Y-n-j")); 
	if( $today >= $one_week)
	{
		$this->update_token();
	}
} 

function update_token()
{
	$date = date('Y-n-j');
	$tokens = array('admin'=> $this->admin,'cliente'=>$this->cliente,'ctp' => $this->ctp);
	foreach($tokens as $type => $token)
	{
		$sql=
		"UPDATE permission
		SET per_token ='$token', per_date ='$date' 
		WHERE per_type ='$type' 
		";
		$up = $this->db->prepare($sql);
		
		$result=$up->execute();
		//var_dump($result);
		if(!$result)
		{
			die('no update token');
		}
	}
return $result;	
}

function change_token()
{
	$this->update_token();
}

function view_token()
{
	$query = 
			"SELECT *
			FROM permission
			";
			
		$consulta = $this->db->prepare($query); 
		$consulta->execute();
		$result = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $result; 
} 


function token_login($type)
{
	$query = 
			"SELECT per_token
			FROM permission
			WHERE per_type= '$type'
			";
		
		$consulta = $this->db->prepare($query); 
		$consulta->execute();
		$result = $consulta->fetch(PDO::FETCH_ASSOC);
		var_dump($result);
		return trim($result['per_token']);
	
}

}
?>
