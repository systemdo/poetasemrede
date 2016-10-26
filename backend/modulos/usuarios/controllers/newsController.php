<?php 
class NewsController extends Controller {

private $name = 'dashboard';
private $permission = 'A'; 

	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{	
		
		
		$is_login= Login::is_login();
		if($is_login)
		{
			
			if(isset($_POST['news']) && $_POST['news']== 'Subir Noticias')
			{
				$new= new News();
				$confirm = $new->begin_news();
				
			}	
			$this->view->catchView('news');

	
		}else{
			Login::reload_login();
			}
	
	
	}
	
	function congratulations()
	{
			$this->view->catchView('congratulations');
	}
	function error()
	{
			$this->view->catchView('error');
	}
	
}
?>