<?php 
class indexController extends Controller {

	function __construct()
	{
		parent::__construct(); 
	}
	
	function index()
	{
			
			
			header('location:'.helper_build_url('login'));
			die();
	}
	
}
?>