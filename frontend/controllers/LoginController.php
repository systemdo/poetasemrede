<?php 

class LoginController extends Controller {
	
    function __construct(){
        parent::__construct(); 
    }

    function index(){
        $this->view->setLayout("loginLayout");
        $this->view();
    }
		
}
?>