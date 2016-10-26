<?php 

class Config{
    
    const DEVELOPER = 1;
    const PRODUCTION = 0;
    protected $lang = false; 
    
    protected $modulo = false; 
    
    public $db = false;
    
    protected $backend = false;
    
    protected $backendUrl = false;
    
    public $environment = self::DEVELOPER;

    function __construct(){
        require_once SD::getPathConfig().'config.php';
        if(!empty($config['lang'])){
            $this->lang = $config['lang'];
        }
        
        if(!empty($config['modulo'])){
            $this->modulo = $config['modulo'];
        }   
        if(!empty($config['database'])){
            $this->db = $config['database'];
        }
        
        if(!empty($config['backend'])){
            $this->backend = $config['backend'];
        }
        if(!empty($config['environment'])){
            $this->environment = $config['environment'];
        } 
    }
    
    function hasModulo(){
        return !$this->modulo ? $this->modulo: true;
    }
    
    function getModulo(){
        return $this->modulo;
    }
    
    function getLang(){
        return $this->lang;
    }
    
    function getDatabase(){
        return $this->db;
    }
    
    function hasBackend(){
        return !$this->backend ? false : true;
    }
    
    function setBackend($backendUrl = false){
        $this->backendUrl = $backendUrl;
    }
    function hasBackendUrl(){
        return !$this->backendUrl ? false : true;
    }
    function environmentIsDeveloper(){
        return $this->environment == self::DEVELOPER;
    }
   
}   
?>
