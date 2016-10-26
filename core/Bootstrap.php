<?php 

Class Bootstrap{

    static function run(Request $request){
        $modulo = $request->getModulo();
        $controller = $request->getController();
        
        if($modulo){
            $path_controller = SD::getPathApp().'/modulos'.'/'.$modulo.'/'.'controllers'.'/'.$controller.'.php';
            
        }else{
                if(!empty($controller)){
                    $controller .='Controller';    
                }else{
                     $controller = 'IndexController';
                }
                $path_controller = SD::getPathApp().'/controllers'.'/'.$controller.'.php';
            }
            //echo $path_controller;
        if (is_readable($path_controller)){
            if(is_file($path_controller)){
                require_once($path_controller);
                
                $controller = ucfirst($controller);
                $controller = new $controller;
                $method = $request->getMethod();
                $arg = $request->getArg();

                if(is_callable(array($controller,$method))){
                    
                    $method = $request->getMethod();
                    
                }else{
                        $method = 'index';
                    }

                if(!empty($arg))
                {
                    call_user_func_array(array($controller,$method), $arg);
                }
                else{
                       call_user_func(array($controller,$method));
                    }
            }else{

                $error = 'The Controller\'s Directory is not found!';
                echo $error;
                //throw new \Exception($error);
                //require_once BASE_PATH.'/apps/frontend/views' .'/'. 'error' .'/'.'error.html';
                die();
            }        
        }else{
                $error = 'Indefined '.$controller;
                echo $error;
                //throw new Exception($error);
                //require_once BASE_PATH.'/apps/frontend/views' .'/'. 'error' .'/'.'error.html';
                die();
            }  
    }

		
}

?>
