<?php 
class registroController extends Controller {
	
	function __construct()
	{
		parent::__construct(); 
	}
	
	function index()
	{
		
			if(!Login::user_registre())
				$this->view->catchView('registro');
	} 
	
	function all_dates()
	{
		Login::user_registre();
		$error = 'todos los campus tienen que ser llenados';
		$this->view->catchView('registro', $error);
	}
	
	function exist_user()
	{
		Login::user_registre();
		$error = 'yet exist user';
		$this->view->catchView('registro', $error);
	}
	
	function different_pass()
	{
		Login::user_registre();
		$error = 'inputs password not same';
		$this->view->catchView('registro', $error);
	}
	
	function minor_six_pass()
	{
		Login::user_registre();
		$error = 'Password not must minor as six';
		$this->view->catchView('registro', $error);
	}
	
	function sorry()
	{
		//hacer vista de errores
		Login::user_registre();
		$error = 'Sorry you registre not be finalyt';
		$this->view->catchView('registro', $error);
	}
	function congratulations()
	{
		//hacer vista de errores
		$this->view->catchView('congratulations');
		header( "refresh:3;url=".APP_URL."/login" );
	}
	
	function not_authorizad()
	{
		die('not authorizad');		
	}
	
	

}
?>