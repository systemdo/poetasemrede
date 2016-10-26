<?php 
Class View{

protected $view;

protected $layout = "layout";

protected $path_view;

protected $controller;

protected $css_files;

    function __construct(){
        $this->controller = SD::$Request->getController();;
        $this->setPathView();
        //SD::print_app($this->getPathView());
    }
    
    public function view($view = 'index', $data = array()){
        $this->view = $view;
        $this->setPathView();
        $content = $this->getRenderedHtml();
        if(is_array($data)){
            if(!empty($data)){
                foreach($data as $name => $object){
                    $$name = $object;
                }
            }
        }
        if($this->layout){
            require_once SD::getPathView().'/layout/'.$this->layout.'.php';
        }
    } 
    
    protected function getController(){
        return $this->controller;
    }
    
    private function getRenderedHtml(){
        ob_start();
            include($this->getPathView());
            $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }
    
    private function setPathView(){
        $this->path_view = SD::getPathView().'/'.$this->getController().'/'.$this->view.'.php';
    }
    
    private function getPathView(){
        return $this->path_view;
    }
    
    private function getObjectToView($array_objects){
        if(is_array($array_objects)){
            foreach($array_objects as $name => $object){
                $$name = $object;
            }
        }
        return $this->path_view;
    }
    public function setCss($files){
        if(is_array($files)){
            $this->css_files = $files;
        }else{
            die("The paramets for getCss must be array");
        }    
    } 
    protected function getCss(){
        $css = '';
        if(is_array($this->css_files)){
            foreach($this->css_files as $file){
                $css .='<link rel="stylesheet" type="text/css" ';
                $css .= 'href="'.$this->getPathCss().'/'.$file.'">';
            }
        }
        echo $css;    
    }
    
    protected function getPathCss(){
        return SD::getAppUrlPublicFiles().'/css';
    }
    public function setJs($files){
        if(is_array($files)){
            $this->css_files = $files;
        }else{
            die("The paramets for getCss must be array");
        }    
    }
    
    protected function getJs(){
        $css = '';
        if(is_array($this->js_files)){
            foreach($this->js_files as $file){
                $css =' <script type="text/javascript" ';
                $css .= 'href="'.$this->getPathJs().'/'.$file.'"></script>';
            }    

        }
        echo $css;    
    }
    
    protected function getPathJs(){
        return SD::getAppUrlPublicFiles().'/js';
    }
   
    

	 	 
} 

?>
