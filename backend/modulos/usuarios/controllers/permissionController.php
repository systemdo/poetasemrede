<?php 
class permissionController extends Controller {

private $permission;
private $permi = 'A';

	function __construct()
	{
		parent::__construct();
		$can = Login::canPermi($this->permi);
		if(!$can)
		 die('Acess forbide');
		$this->permission = new Permission();
	}
	
	function index()
	{
			$is_login=Login::is_login();
			
			if($is_login)
			{
				$this->permission->change_token_week();
				$data = $this->permission->view_token();
				if(isset($_POST['email']) && isset($_POST['sendemail']))
				{
					$this->loadlib('class.phpmailer');
					var_dump($_POST);
					$subject = "Liberación de Aceso";
					$body ='Tu clave de segurudad'.$_POST['token'];
					$dire = $_POST['email']; 
					$body.= 'Chicos soy yo que estou jugando con la clase php-mail, enfim la pude hacer andar<p/>saludos Lucas';
					 sendEmail($dire,$subject, $body);	
				}
				$this->view->catchView('permission', $data);
			}else{Login::nucleo_pag();}	
	}
	
	function update() 
	{
		$ok=$this->permission->change_token();
		header( "refresh:1;url=".APP_URL."/permission"); 
	}
	function send()
	{
		
	}
}
?>