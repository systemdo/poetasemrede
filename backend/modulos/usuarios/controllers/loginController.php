<?php 
class loginController extends Controller {

	function __construct()
	{
		parent::__construct(); 
	}
	
	function index()
	{
			$is_login=Login::is_login();
			if(!$is_login)
			{
				if(isset($_POST['user']) and isset($_POST['pass']))
				{		
					$auth = Login::catchUser();
					$hash=Login::getUser();
						if(!$auth)
						{
								Login::pass_error();
						}else{
								Login::nucleo_pag();
							 }


				}
						
					$this->view->catchView('login');
			}else{Login::nucleo_pag();}	
	}
	
	
	function error()
	{
		$error = true; 
		$is_login=Login::is_login();
		if(!$is_login)
		{
		
			if(isset($_POST['user']) and isset($_POST['pass']))
			{		
				
				$auth = Login::catchUser();
				$hash=Login::getUser();
					if(!$auth)
					{
							Login::pass_error();
					}else
							{
									Login::nucleo_pag();
							}
				
			$error = false;		
			}
		   $this->view->catchView('login', $error);
		}
	} 

}
?>