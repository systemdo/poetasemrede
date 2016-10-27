<?php 

class IndexController extends Controller {
	
    function __construct(){
        $this->auth = true;               
        parent::__construct();

    }

    function index(){
        $this->view();
    }
		
}
?>