<?php 
class VideosController extends Controller {

private $consult;
	function __construct()
	{
		parent::__construct(); 
		$this->consult = new Consult();
	}
	
	//ALTER TABLE test ADD permiso  VARCHAR(60) AFTER clave;
	function index()
	{		
		$data['videos']= $this->consult->cath_all_videos();
		$this->view->catchView('videos',$data);
	}
	
	
}
?>