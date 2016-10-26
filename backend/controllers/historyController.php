<?php 
class HistoryController extends Controller {
	
	function __construct()
	{
		parent::__construct(); 
	}
	
	function index()
	{
		
		$this->view->catchView('history');
		
		
	}
	
	
}
?>