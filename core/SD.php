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

    function init() {
        define('BASE_PATH', dirname(dirname(__FILE__)));

        define('PATH_CORE', __DIR__);

        define('PATH_FRONTEND', BASE_PATH . '/frontend');

        define('PATH_BACKEND', BASE_PATH . '/backend');

        define('PATH_CONFIG', BASE_PATH . '/config/');

        define('APP_URL', self::getServerName());


        //spl_autoload_register(array(new SD,'loadCoreClass'));
        self::$app_url = APP_URL;
        self::loadCoreClass();
        self::$Config = new Config();
        //GeneratorModels::loadGenerator();
        self::$Request = new Request();


        Bootstrap::run(self::$Request);
    }

    static function getPathCore() {

        return PATH_CORE;
    }

    static function getBasePath() {
        return BASE_PATH;
    }

    static function getBaseApp() {
        return BASE_APP;
    }

    static function getPathFrontend() {

        return PATH_FRONTEND;
    }

    static function getPathBackend() {
        return PATH_BACKEND;
    }

    static function getPathConfig() {
        return PATH_CONFIG;
    }

    static function getPathModels() {
        if (self::$Config->hasBackendUrl()) {
            return self::getPathBackend() . '/models';
        } else {
            return self::getPathFrontend() . '/models';
        }
    }

    static function getPathView() {
        if (self::$Config->hasBackendUrl()) {
            return self::getPathBackend() . '/views';
        } else {
            return self::getPathFrontend() . '/views';
        }
    }

    static function getController() {
        return $this->controller;
    }

    function getModulo() {
        return $this->modulo;
    }

    function getMethod() {
        return $this->method;
    }

    function getArgs() {
        return $this->args;
    }

    static function openDirClass() {

        $core_files = scandir(self::getPathCore());
        foreach ($core_files as $key => $file) {
            if (strpos($file, '.php')) {
                array_push(self::$core_class, $file);
            }
        }
    }

    //load all class inside systemC
    static function loadCoreClass() {
        self::openDirClass();
        foreach (self::$core_class as $class) {
            if (file_exists(self::getPathCore() . '/' . $class)) {
                require_once self::getPathCore() . '/' . $class;
            }
        }
    }

    static function loadModelClass($model) {
        if (is_array($model)) {
            foreach ($model as $class) {
                if (file_exists(self::getPathCore() . '/' . $class)) {
                    require_once self::getPathCore() . '/' . $class;
                }
            }
        } else {
            require_once self::getPathModels() . '/' . $class;
        }
    }

    /**
     *
     */
    static function getPathApp() {

        $backend = self::$Config->hasBackendUrl();
        if ($backend) {
            return self::getPathBackend();
        } else {
            return self::getPathFrontend();
        }
    }

    static function setRequest(Request $request) {
        self::$Request = $request;
    }

    static function getRequest() {
        return self::$Request;
    }

    static function printApp($d) {
        echo "<pre>";
        print_r($d);
        echo "</pre>";
    }

    static function getServerName() {
        //$host = $_SERVER['SERVER_NAME'];
        $host = $_SERVER['HTTP_HOST'];
        $protocol = $_SERVER['SERVER_PROTOCOL'];
        $aProtocol = explode('/', $protocol);
        $protocol = strtolower($aProtocol[0]);

        //SD::printApp($_SERVER);die("helo");
        
        if ($host == 'localhost') {
            $uri = $_SERVER['REQUEST_URI'];
            if ($_SERVER['HTTP_HOST'] == 'localhost:82' or $_SERVER['HTTP_HOST'] == 'localhost') {
                $host = $_SERVER['HTTP_HOST'];
            }
            //var_dump(array_filter(explode('/', $uri)));
            $uri = array_values(array_filter(explode('/', $uri)));
            $host = $host . '/' . $uri[0];
            //var_dump($protocol . '://' . $host);
            //die($host);
            return $protocol . '://' . $host;
        }else{
           return self::$app_url;
        }
       //SD::printApp($host);die("helo");

    }
    
    static function getAppUrl() {
        //echo self::getServerName();die();
        return self::getServerName();
    }

    static function getAppUrlForPlace() {
        // self::print_app($host);
        $backend = self::$Config->hasBackendUrl();
        if ($backend) {
            return self::getAppUrl() . '/backend';
        } else {
            return self::getAppUrl() . '/frontend';
        }
    }

    static function getAppUrlPublicFiles() {
        return self::getAppUrlForPlace() . '/web';
    }

    static function isXmlHttpRequest() {
        $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? $_SERVER['HTTP_X_REQUESTED_WITH'] : null;
        return (strtolower($isAjax) === 'xmlhttprequest');
    }

    /**
     * @param void $ Description 
     * ret
     */
    static function setEnvironment() {
        $backend = self::$Config->hasBackendUrl();
    }

    static function redirect($place) {

        if (self::$Config->hasBackendUrl()) {
            $url = self::getAppUrlForPlace() . '/' . $place;
        } else {
            $url = self::getAppUrl() . '/' . $place;
        }
        //var_dump($url);
        header("Location:$url");
    }

    /**
     * @static method
     * @return String get Url' upload path app inside web' dir
     */
    static public function getUrlUpload($dir = false) {
        if ($dir) {
            return self::getAppUrlPublicFiles() . '/' . $dir;
        }
        return self::getAppUrlPublicFiles() . '/uploads';
    }

    /**
     * @static method
     * @return String get dir's upload path app inside web' dir
     */
    static public function getPathUpload($dir = false) {
        if ($dir) {
            self::getPathApp() . 'web/uploads/' . $dir;
        }
        return self::getPathApp() . '/web/uploads';
    }

    static function getPathLibraries() {
        return self::getBasePath() . '/libraries';
    }
    /**
     * @static method
     * @return UserSystem return application's UserSystem 
     */
    static function getUserSystem(){
        return Login::getUserSession();
    }
    
    static function getUrlTumbImg(){
        $image = SD::getUrlUpload(). 'imagens_'.$this->id.'/thumbs/poeta_thumb.jpeg';
        if (!file_exists($image)) {
            $image = SD::getUrlUpload()."/imgteste.jpg";
        } 
        
        return $image;
    }
    
    static function loadModels($models,$pasta=false){
        
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


}
