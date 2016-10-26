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
		$datacontent = $this->model->all_year();		
		$x = 1;
		$y = 1;
		$data = false;
		if($datacontent)
		{
			foreach($datacontent as $key => $content)
			{
				if($x > 6)
				{
					$y=$y+1;
					$x = 0;
				}	
					$data['years'][$y] [$key] = $content;
		 
				
				$x++;
			}
		}	
		$this->view->catchView('photos-year',$data);
	}
	function catch_event($year)
	{
		$datacontent = $this->model->all_event_by_id_year($year);
		$data['year'] = $this->model->year_by_id($year);
		//var_dump($data['year']);
		//$data['tumbs'] = $this->model->year_by_id($year);
		$x = 1;
		$y = 1;

		if($datacontent)
		{
			foreach($datacontent as $key => $content)
			{
				if($x > 6)
				{
					$y=$y+1;
					$x = 0;
				}	
					$data['events'][$y] [$key] = $content;
		 
				
				$x++;
			}
		}else
			{
				$data = false;
			}	
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
