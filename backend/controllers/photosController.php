<?php 
class PhotosController extends Controller {

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
		$data['years'] = $this->model->all_year();		
		
		
		$this->view->catchView('photos-year',$data);
	}
	function catch_event($year)
	{
		$data['events']= $this->model->all_event_by_id_year($year);
		$data['year'] = $this->model->year_by_id($year);
		//var_dump($data['year']);
		//$data['tumbs'] = $this->model->year_by_id($year);
	
		$this->view->catchView('photos-event',$data);
	}
	function see_photos($id,$event)
	{
		$data['imgs'] =$this->model->all_img_by_event($id);
		
		$ev = $this->model->event_by_id($id);
		
		$data['event'] = $ev->ev_name;
		
		$this->view->catchView('photos',$data);
	}
	
}
?>
