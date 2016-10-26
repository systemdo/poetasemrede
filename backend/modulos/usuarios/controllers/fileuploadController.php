<?php 
class fileuploadController extends Controller {

private $permission = 'M';
	
	function __construct()
	{
		parent::__construct(); 
	
	}
	
	//ALTER TABLE test ADD permiso  VARCHAR(60) AFTER clave;
	function index()
	{		
		if(Login::is_login())
		{
			var_dump($_SESSION);
			if(isset($_SESSION['event']) && isset($_SESSION['event']))
			{
				$this->view->catchView('fileupload');
			}else{
					header('Location:'.helper_build_url('preupload'));
				}	
		}else{
				Login::reload_login();
			}	
	} 
	
	function end_upload_img()
	{
		if(isset($_SESSION['year']) && isset($_SESSION['event']))
		{
			unset($_SESSION['year']);
			unset($_SESSION['event']);
		}
		header("Location:".helper_build_url('preupload'));
		die();
	}	
	
	
	
	
	
}
?>