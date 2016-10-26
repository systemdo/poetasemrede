<?php 
class errorController extends Controller {

private $name = 'error';
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->view->catchView('error');
		die();
	}
	
	function nohabilitado()
	{
		$this->view->catchView('nohabilitado');
		die();
	} 
}
?>