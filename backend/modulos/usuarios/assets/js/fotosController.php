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
			
			//var_dump($_POST);
			//$data['error']= false;
			//$data['year'] =$this->consult->consult_id_year_photos();
			//$data['event'] = $this->consult->consult_id_year_photos();
			
			/*if(isset($_POST['begin']) && $_POST['begin'] == "Crear Evento")
			{
				//var_dump($_POST); 
				$ope= new Operation();
				$year = trim($_POST['year']); 
				//$newyear = trim($_POST['newyear']); 
				$event = trim($_POST['event']); 
				$newevent = trim($_POST['newevent']); 
				
				if($year == "false"  )
				{
					$ope->save_year($newyear);
				}
				if($event == "nuevo_event")
				{ 
					$event = $ope->save_event($newevent,$year);
				}
				
				$_SESSION['year'] = $year;
				$_SESSION['event'] = $event;
				
				if(isset($_SESSION['year']) && isset($_SESSION['event']))
				{
						header('Location:'.helper_build_url('fileupload'));
				}else{ $data['error'] = "Falla en crear evento"; }
			}else{ 
					if(isset($_POST)){$error['error'] = "Falla en crear evento";}
				}
			*/

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
	
	function imgs_by_event()
	{
		
		$data['imgs'] = $this->model->all_img_by_event($_POST['id']);
		$this->view->catchView('listafotos',$data, true);
	}
	
	function new_year()
	{

		$this->view->catchView('new_year');
	}
	function save_year()
	{
		$yes = $this->model->verificar_year($_POST['titulo_year']);
		if($yes)
		{
			json_encode(array('error'=> true));
		}
		else{
				$upload_handler = new UploadHandler();
				$file=$upload_handler->getFile();
				$this->model->save_year($file[0]->name,$file[0]->titulo);
			}
	}
	
	
}
?>
