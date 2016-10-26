<?php 
class preuploadController extends Controller {

private $permission = 'M';
private $consult;
	function __construct()
	{
		parent::__construct(); 
		$this->consult = new Consult();
	}
	
	//ALTER TABLE test ADD permiso  VARCHAR(60) AFTER clave;
	function index()
	{		
		if(Login::is_login())
		{
			
			//var_dump($_POST);
			$data['error']= false;
			$data['year'] =$this->consult->consult_id_year_photos();
			$data['event'] = $this->consult->consult_id_year_photos();
			
			if(isset($_POST['begin']) && $_POST['begin'] == "Crear Evento")
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
			}else{ //if(isset($_POST)){$error['error'] = "Falla en crear evento";}
				}
			
			$this->view->catchView('preupload',$data);
		}	
		else{
				Login::reload_login();
			}	
	}
	
	function selectevent()
	{
		
		$ye_id = $_POST['select'];
		$return = $this->consult->cons_event_by_year_id($ye_id);
		echo json_encode($return);
	}
	
	
}
?>