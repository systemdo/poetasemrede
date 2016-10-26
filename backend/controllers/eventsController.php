<?php 
class EventsController extends Controller {
	
	function __construct()
	{
		parent::__construct(); 
	}
	
	function index()
	{
		
		$model=$this->loadModel('index');
		$data = $model->home(); 
		$this->view->catchView('events',$data);
		
		
	}
	
	
}
?>