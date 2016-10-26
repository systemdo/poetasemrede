<?php 
class logoutController extends Controller {
	
	function __construct()
	{
		parent::__construct(); 
	}
	
	function index()
	{
		if(Login::is_login())
		{
				Login::logout();
				Login::reload_login();
		}else
			{
				Login::notFound();
			}
	} 

}


?>
