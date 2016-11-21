<?php 

abstract class Controller{
	
    protected $view;
    
    protected $_view;
    
    protected $layout = true; 
    
    protected $controller;
    
    protected $path_view;
    
    protected $auth = false;
    
    protected $login;

    public function __construct(){
        
        $this->view = new View();
        $this->login = new Login();
        $this->controller = SD::$Request->getController();
        if($this->auth){
            if(!Login::isLogin()){
                Login::loginRedirect();
            };
        }
        
    }

    abstract public function index();
    
    protected function view($view='index', $data=false){
        $this->view->view($view, $data);

    } 
    
    protected function getController(){
        return $this->controller;
    }
    
    protected function loadModels($models,$pasta=false){
        if(is_array($models)){
            foreach($models as $model){
                if($pasta){
                    require_once SD::getPathModels().'/'.$pasta.'/'.$model.'.php' ;
                }else{
                    require_once SD::getPathModels().'/'.$model.'.php' ;
                }    
            }
        }else{
                if($pasta){
                    require_once SD::getPathModels().'/'.$pasta.'/'.$models.'.php' ;
                }else{
                    require_once SD::getPathModels().'/'.$models.'.php' ;
                }    
        }
    }
    
    protected function loadLibraries($libraries , $pasta=false){
        if(is_array($libraries)){
            foreach($libraries as $library){
                if($pasta){
                    require_once SD::getPathLibraries().'/'.$pasta.'/'.$library.'.php' ;
                }else{
                    require_once SD::getPathLibraries().'/'.$library.'.php' ;
                }    
            }
        }else{
                if($pasta){
                    require_once SD::getPathLibraries().'/'.$pasta.'/'.$libraries.'.php' ;
                }else{
                    require_once SD::getPathLibraries().'/'.$libraries.'.php' ;
                }    
        }
    }
    
    protected function isXmlHttpRequest(){
       if(SD::isXmlHttpRequest()){
           $this->layout = false;
           return true; 
       }
       return false;
    }
    
    protected function getJson($data){
        echo json_encode($data);
    }
    
    function setSessionBag($data = array()){
        if(!empty($data)){
            $_SESSION['bag'] = $data;
        }
    }
    
    function getSessionBag(){
        if(isset($_SESSION['bag'])){
            $bag = $_SESSION['bag'];
            unset($_SESSION['bag']);
            return $bag;
        }else{
            return false;
        }
    }
        

}

?>
