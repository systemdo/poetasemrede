<?php 
class fotosController extends Controller {

private $fotos;
private $model;

	function __construct()
	{
		parent::__construct();
		$this->model=$this->loadModel('fotos');
		$this->fotos= new Fotos();
	}
	
	function index()
	{		
		if(Login::is_login())
		{
			$data['years'] = $this->model->all_year();
			$this->view->catchView('fotos',$data);
		}	
		else{
				Login::reload_login();
			}	
	}
	
	function events_by_years()
	{
		
		$data['events'] = $this->model->all_event_by_id_year($_POST['id']);
		//var_dump($data);
		$this->view->catchView('eventos',$data, true);
	}
	
	function imgs_by_event($id)
	{
		
		$data['imgs'] = $this->model->all_img_by_event($id);
		$this->view->catchView('listafotos',$data);
	}
	
	function new_year()
	{

		$this->view->catchView('new_year');
	}
	function new_fotos($id)
	{
		$data['id_event'] = $id;
		$this->view->catchView('new_fotos', $data);
	}
	
	function save_year()
	{
		/*$yes = $this->model->verificar_year($_POST['titulo_year']);
		if($yes)
		{
			json_encode(array('error'=> true));
		}
		else{*/
				$upload_handler = new UploadHandler();
				$file=$upload_handler->getFile();
				$this->model->save_year($file[0]->name,$file[0]->titulo);
				
			//}*/
	}
	function save_event()
	{
		$callback = $this->model->save_event($_POST['titulo'],$_POST['id']);
		echo json_encode(array('callback' => $callback, 'redirect' => helper_build_url('fotos')));
	}
	function save_fotos()
	{
		$upload_handler = new UploadHandler();
		$files=$upload_handler->getFile();
		foreach($files as $key => $file)
		{
			$this->model->save_fotos($file->name,$file->titulo);
		}
	}
	function delete_year()
	{
		$callback = $this->model->delete_year($_POST['id']);
		echo json_encode(array('callback' => $callback));
	}
	function delete_event()
	{
		$callback = $this->model->delete_event($_POST['id']);
		echo json_encode(array('callback' => $callback));
	}
	function delete_fotos()
	{
		$callback = $this->model->delete_img($_POST['id']);
		echo json_encode(array('callback' => $callback));
	}
	
}
?>
