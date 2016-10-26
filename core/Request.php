<?php

class Request {
    
    private $URL = false;
    
    private $URI = false;
    
    private $lang = false;
    
    public $localhost;
    
    private $modulo = false;

    private $backend = false;
    
    /**
     * 
     * @access private
     */
    private $controller;
 
     /**
     * 
     * @access private
     */
    private $method;
 
    /**
     * 
     * @access private
     */
    private $arg;
    
	
    
    function __construct(){        
         
        
        $this->URI = isset($_SERVER["REQUEST_URI"])? $_SERVER["REQUEST_URI"]: $_SERVER["QUERY_STRING"];
       
        if(!empty($this->URI)){
            $URI = explode('/', $this->URI);
            $this->URI = array_filter($URI);
            
            if($_SERVER["SERVER_NAME"] == "localhost"){
                $this->localhost = array_shift($this->URI);
            }
             
            if(!empty($this->URI)){
                
                if(SD::$Config->hasBackend()) {					    
                    if(in_array("backend", $this->URI)){
                        array_shift($this->URI); 
                        SD::$Config->setBackend(true);
                    }
                }	
            }
            
            if(!empty($this->URI)){
                $this->modulo = SD::$Config->hasModulo();
                if($this->modulo)
                {					    
                    $this->modulo = trim(strtolower(array_shift($this->URI)));        
                }	
            }
            
            if(!empty($this->URI)){
                
                $this->controller = trim(strtolower(array_shift($this->URI)));        
            }	
            
            if(!empty($this->URI)){
                
                $this->method = trim(strtolower(array_shift($this->URI)));        
            }	
            
            if(!empty($this->URI)){
                
                $this->arg = $this->URI;        
            }	
        } 
    }
	
    function getModulo(){
        return $this->modulo;
    }
    
    function getController(){
	
        if($this->controller){
            if(strpos($this->controller, '-')!== false)
            {
                $controller = explode('-',$this->controller);
                $stringController = '';
                foreach($controller as $key => $value){

                   if($key > 0){
                       $value = ucfirst($value);
                   } 
                   $stringController .= trim($value);
                   
                }
                $this->controller = $stringController;
            }       
        }else{
           $this->controller = 'index';
        }
        return  $this->controller;
    }
	
    function getMethod(){
        return $this->method;	
    }
	
	function getArg()
	{
		return $this->arg;	
	}
	
	function setLang()
	{
		$langs = Config::$config['langs'];
		//var_dump($langs);
		$lang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
		//echo '///';
                //_dump($lang);
		//echo 'end';
		
		if(!in_array($lang,$langs))
				$lang = 'en';
				
		
		if(!in_array($lang,$langs))
			$lang = array_shift(Config::$config['langs']);
			
		$this->lang = $lang;	
	}
	
}
