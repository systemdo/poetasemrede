<?php 
class DashboardController extends Controller {

private $name = 'dashboard';
private $model;

	
	function __construct()
	{
		parent::__construct();
		$is_login= Login::is_login();
		if(!$is_login)
		{
			Login::reload_login();
		}	
		
		$this->model=$this->loadModel('dashboard');
	}
	
	function index()
	{	
		
		$is_login= Login::is_login();
		if($is_login)
		{
			
			$data['home'] = $this->model->home();
			$this->view->catchView('dashboard', $data);
			
		}else{
				Login::reload_login();
			}
	
	
	}
	
	function new_home()
	{	
		$this->view->layout=false;
		$this->view->catchView('new_home');
	}
	
	function save_home()
	{	
		$upload_handler = new UploadHandler();
		$file=$upload_handler->getFile();
		$this->model->crear_home($file[0]->name,$file[0]->titulo, $_POST['informe']);
	}
	
	function editar_home($id)
	{	
		$this->view->layout=false;
		$data['evento'] = $this->model->home_id($id);
		$this->view->catchView('editar_home',$data);
	}
	function edit_home()
	{			
		$result = $this->model->editar_home($_POST['id'], $_POST['titulo'],$_POST['informe']);
		echo json_encode(array('callback' => $result, 'redirect' => helper_build_url('dashboard/editar_home/'.$_POST['id'])));
	}
	
	function status()
	{	
		switch($_REQUEST['status'])
		{
			case 'activar':
				$result = $this->model->activar_home($_POST['id']);
			break;	
			case 'desactivar':
				$result = $this->model->desactivar_home($_POST['id']);
			break;
			
		}
		echo json_encode(array('callback' => $result));
	}
	function eventos()
	{	
		switch($_REQUEST['status'])
		{
			case 'activar':
				$result = $this->model->activar_eventos($_POST['id']);
			break;	
			case 'desactivar':
				$result = $this->model->desactivar_eventos($_POST['id']);
			break;
			
		}
		echo json_encode(array('callback' => $result));
	}
	function delete_home()
	{	
		
		$result = $this->model->delete_home($_POST['id']);
		echo json_encode(array('callback' => $result));
	}
	
}
?>
