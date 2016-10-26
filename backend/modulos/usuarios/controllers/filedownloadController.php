<?php 
class filedownloadController extends Controller {

private $name = 'upload';	
private $permission = 'B';
private $project;	
	function __construct()
	{
		parent::__construct(); 
		$this->project = new Consult(Login::getUser());
	}
	
	function index()
	{
			
	}

	function consult($id_operation)
	{
		$is_login= Login::is_login();
		if($is_login)
		{
			$can = Login::canPermi($this->permission);
			if ($can){
				$projects=$this->project->images_as_project($id_operation);
				$this->view->catchView('filedownload',$projects);
			}
			else{
				Login::pass_error();
			}

		}
		else{ die('Acess forbide');}	
		
	}
	
	function see_image($id_arc)
	{
		$is_login= Login::is_login();
		if($is_login)
		{
			$can = Login::canPermi($this->permission);
			if ($can){
					$this->project->download_image($id_arc);
			}
			else{
				Login::pass_error();
			}

		}
		else{ die('Acess forbide');}	
		
	}
}
?>