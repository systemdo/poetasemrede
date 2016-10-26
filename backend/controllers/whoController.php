<?php 
class WhoController extends Controller {
	
	function __construct()
	{
		parent::__construct(); 
	}
	
	function index()
	{
		
		$this->view->catchView('who');
		
		
	}
	
	
}
?>