<?php 
class NewsController extends Controller {
	
	function __construct()
	{
		parent::__construct(); 
	}
	
	function index()
	{
		
		$this->view->catchView('news');
		
		
	}
	
	
}
?>