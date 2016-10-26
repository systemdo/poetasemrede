<?php 
class VideosController extends Controller {

private $consult;
	function __construct()
	{
		parent::__construct(); 
		$this->model=$this->loadModel('videos');
	}
	
	//ALTER TABLE test ADD permiso  VARCHAR(60) AFTER clave;
	function index()
	{		
		if(Login::is_login())
		{

			$data['videos'] = $this->model->all_videos();
			$this->view->catchView('lista_video',$data);
		}	
		else{
				Login::reload_login();
			}	
	}
	function nuevo_video()
	{		
	
		$this->view->catchView('nuevo_video');
	
	}
	
	function new_video()
	{
				
		$callback = $this->model->save_video($_POST['titulo'],$_POST['url']);
		echo json_encode(array('callback' => $callback, 'redirect' => helper_build_url('videos/editar/'.$callback)));
				
	}
	
	function see_video($id)
	{
		
		$data['video'] = $this->model->cath_videos($id);
		$this->view->catchView('see_video', $data);
	}
	function editar($id)
	{
		$data['video'] =  $this->model->cath_videos($id);
		$this->view->catchView('editar_video', $data);
	}
	
	function save()
	{
		$callback = $this->model->edit_video($_POST['id'],$_POST['titulo'],$_POST['url']);
		echo json_encode(array('callback' => $callback, 'redirect' => helper_build_url('videos/editar/'.$_POST['id'])));
	} 
	
	function borrar()
	{
			
			$callback = $this->model->delete_video($_POST['id']);
			echo json_encode(array('callback' => $callback, 'redirect' => helper_build_url('videos')));
		
	}
}
?>