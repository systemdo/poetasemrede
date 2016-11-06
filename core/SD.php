<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SD
 *
 * @author lsmarques
 */

class SD {
   
   
    private $controller;
    
    private $modulo;
    
    private $method;
    
    private $args;
    
    static $core_class = array();
    
    static $backend;
    
    static $Config;
    
    static $Request;
    
    static $app_url;
    
    static $DB;
    
    /*
     * Begin System 
     */ 
    function init(){
        define('BASE_PATH' , dirname(dirname(__FILE__)));

        define('PATH_CORE' , __DIR__);

        define('PATH_FRONTEND' , BASE_PATH.'/frontend');

        define('PATH_BACKEND' , BASE_PATH.'/backend');

        define('PATH_CONFIG' , BASE_PATH.'/config/');
        
        define('APP_URL', self::getServerName());
        

        //spl_autoload_register(array(new SD,'loadCoreClass'));
        self::$app_url = APP_URL;
        self::loadCoreClass();
        self::$Config = new Config();
        //GeneratorModels::loadGenerator();
        self::$Request = new Request();
        
        
       	Bootstrap::run(self::$Request);
    }
    
    static function getPathCore(){

        return PATH_CORE;
    }
    
    static function getBasePath(){
        return BASE_PATH;
    }
    
    static function getBaseApp(){
        return BASE_APP;
    }
    
    static function getPathFrontend(){
    	
        return PATH_FRONTEND;
    }
    
    static function getPathBackend(){
        return PATH_BACKEND;
    }
    
    static function getPathConfig(){
        return PATH_CONFIG;
    }
    
    static function getPathModels(){
        if(self::$Config->hasBackendUrl()){
            return self::getPathBackend().'/models';
        }else{
            return self::getPathFrontend().'/models';
        }
    }
    
    static function getPathView(){
        if(self::$Config->hasBackendUrl()){
            return self::getPathBackend().'/views';
        }else{
            return self::getPathFrontend().'/views';
        }
    }
    
    static function getController(){
	return $this->controller;
    } 
    
    function getModulo(){
        return $this->modulo;
    }
    
    function getMethod(){
        return $this->method;
    }
    
    function getArgs(){
        return $this->args;
    }

    static function openDirClass(){        
        
        $core_files = scandir(self::getPathCore());
        foreach ($core_files as $key => $file) {
            if(strpos($file, '.php')){
                array_push(self::$core_class, $file);
            }
        }
    }
    
    //load all class inside systemC
    static function loadCoreClass(){
        self::openDirClass();
        foreach(self::$core_class as $class)
        {   
            if(file_exists(self::getPathCore().'/'.$class))
            {
                require_once self::getPathCore().'/'.$class;
            }   
        }
    }
    
    static function loadModelClass($model){
        if(is_array($model)){
            foreach($model as $class)
            {   
                if(file_exists(self::getPathCore().'/'.$class))
                {
                    require_once self::getPathCore().'/'.$class;
                }   
            }
        }else{
             require_once self::getPathModels().'/'.$class;
        }
    }
    
    static function getPathApp(){
        
        $backend = self::$Config->hasBackendUrl();
        if($backend){
            return self::getPathBackend();
        }else{       
            return self::getPathFrontend();
        }
    }
    
    static function setRequest(Request $request){ 
        self::$Request = $request;
    }
    
    static function getRequest(){
       return self::$Request;
    }
    
    
    static function printApp($d){
        echo "<pre>";
        print_r($d);
        echo "</pre>";
    }
    
    static function getServerName(){
	//$host = $_SERVER['SERVER_NAME'];
        $host = $_SERVER['HTTP_HOST'];
	$protocol = $_SERVER['SERVER_PROTOCOL'];
	$aProtocol = explode('/',$protocol);
	$protocol = strtolower($aProtocol[0]);
        
        //SD::print_app($_SERVER);die("helo");
	if($host == 'localhost')
	{
		$uri = $_SERVER['REQUEST_URI'];
		if($_SERVER['HTTP_HOST'] == 'localhost:82' or $_SERVER['HTTP_HOST'] == 'localhost'){
                    $host =  $_SERVER['HTTP_HOST'];
                    
                }	
		//var_dump(array_filter(explode('/', $uri)));
		$uri = array_values(array_filter(explode('/', $uri)));
		$host = $host.'/'.$uri[0];	
	}
        
	return $protocol.'://'.$host;
    }
    
    static function getAppUrl(){
        return self::$app_url;
    }
    
    static function getAppUrlForPlace(){
       // self::print_app($host);
        $backend = self::$Config->hasBackendUrl();
        if($backend){
            return self::getAppUrl().'/backend';
        }else{       
            return  self::getAppUrl().'/frontend';
        }
    }
    
    static function getAppUrlPublicFiles(){
       return self::getAppUrlForPlace().'/web';
    }
    
    static function isXmlHttpRequest() {
        $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? $_SERVER['HTTP_X_REQUESTED_WITH'] : null;
        return (strtolower($isAjax) === 'xmlhttprequest');
    }
    /*
     * @function 
     * ret
     */
    static function setEnvironment(){
        $backend = self::$Config->hasBackendUrl();
    }
    
    static function redirect($place){
              
        if(self::$Config->hasBackendUrl()){
            $url = self::getAppUrlForPlace().'/'.$place;
        }else{
             $url = self::getAppUrl().'/'.$place;
        }
        //var_dump($url);
        header("Location:$url");
    }
    
    
    static public function getUrlUpload($dir = false){
       if($dir){
           return self::getAppUrlPublicFiles().'/'.$dir;
       } 
       return self::getAppUrlPublicFiles().'/uploads';
    }
}