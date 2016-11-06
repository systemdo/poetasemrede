<?php 
Class View{

protected $view;

protected $layout = "layout";

protected $path_view;

protected $controller;

protected $css_files;

protected $js_files;

protected $data;
    function __construct(){
        $this->controller = SD::$Request->getController();;
        $this->setPathView();
        //SD::print_app($this->getPathView());
    }
    
    public function view($view = 'index', $data = array()){
        $this->view = $view;
        $this->setPathView();
        
        if(is_array($data)){
            if(!empty($data)){
                foreach($data as $name => $object){
                    $$name = $object;
                    $this->data [$name] = $$name; 

                }
            }
        }
        
        $content = $this->getRenderedHtml();
        if($this->layout){
            require_once SD::getPathView().'/layout/'.$this->layout.'.php';
        }
    }
    
    public function viewAjax($view = 'index', $data = array()){
        $this->view = $view;
        $this->setPathView();
        if(is_array($data)){
            if(!empty($data)){
                foreach($data as $name => $object){
                    $$name = $object;
                }
            }
        }
        require_once SD::getPathView().'/'.$view.'.php';
        
    }
    /*@return
     */
    public function getSliceView($view = 'index', $data = array()){
        $this->view = $view;
        $this->setPathView();
        if($data){
            if(is_array($data)){
                if(!empty($data)){
                    foreach($data as $name => $object){
                        $$name = $object;
                    }
                }
            }
        }
        require_once SD::getPathView().'/'.$view.'.php';
        
    }
     public function getSliceViewHtml($view = 'index', $data = array()){
        $this->view = $view;
        $this->setPathView();
        if(is_array($data)){
            if(!empty($data)){
                foreach($data as $name => $object){
                    $$name = $object;
                    $this->data [$name] = $$name; 

                }
            }
        }
        
        return $this->getRenderedHtml(SD::getPathView().'/'.$view.'.php');
       
    }
    
    public function setLayout($layout){
        return $this->layout = $layout;
    }
    
    protected function getController(){
        return $this->controller;
    }
    
    private function getRenderedHtml($path = false){
        ob_start();
            
            if(is_array( $this->data)){
                if(!empty( $this->data)){
                    foreach( $this->data as $name => $object){
                        $$name = $object;
                        $this->data [$name] = $$name; 

                    }
                }
            }
            if($path){
                include($path);
            } else{
                include($this->getPathView());
            }   
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
            die("The paramets for setCss must be array");
        }    
    } 
    protected function getCss(){
        $css = '';
       if(!empty($this->css_files)){
            if(is_array($this->css_files)){
                foreach($this->css_files as $file){
                    $css .='<link rel="stylesheet" type="text/css" ';
                    $css .= 'href="'.$this->getPathCss().'/'.$file.'">';
                }
            }
       }
        echo $css;    
    }
    
    protected function getPathCss(){
        return SD::getAppUrlPublicFiles().'/css';
    }
    public function setJs($files){
        if(is_array($files)){
            $this->js_files = $files;
        }else{
            die("The paramets for setJs must be array");
        }    
    }
    
    protected function getJs(){
        $js = '';
        if(!empty($this->js_files)){
            if(is_array($this->js_files)){
                foreach($this->js_files as $file){
                    $js .=' <script type="text/javascript" ';
                    $js .= 'src="'.$this->getPathJs().'/'.$file.'"></script>';
                }    

            }
        }    
        echo $js;    
    }
    
    protected function getPathJs(){
        return SD::getAppUrlPublicFiles().'/js';
    }
   
    

	 	 
} 

?>
