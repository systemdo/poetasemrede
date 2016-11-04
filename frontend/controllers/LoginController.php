<?php 

class LoginController extends Controller {
	
    function __construct(){
        parent::__construct(); 
    }

    function index(){
        $this->view->setLayout("LoginLayout");
        $this->view();
    }
    
    function login(){
          //Login::logout();
        if(!Login::isLogin()){
            $email = $_POST['loginEmail'];
            $password = $_POST['loginPassword'];
            if(Login::login($email, $password)){
                Login::loginRedirect('index');
            }else{
                 $this->view->setLayout("LoginLayout");
            }
           
        }else{
            Login::loginRedirect('index');
        }
    }
    
    function logout(){
        
    }
		
}
?>