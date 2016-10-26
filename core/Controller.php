<?php 

abstract class Controller{
	
    protected $view;
    
    protected $_view;
    
    protected $layout = true; 
    
    protected $controller;
    
    protected $path_view;
    
    protected $auth = false;


    public function __construct(){
        
        $this->view = new View();
        $this->controller = SD::$Request->getController();
        if($this->auth){
            Login::isLogin();
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
    

}

?>
