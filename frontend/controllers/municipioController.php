<?php 

class MunicipioController extends Controller {
	
    function __construct(){
        parent::__construct(); 
    }

    function index(){
        
        $this->view();
    }
    
    function conseguirMunicipios(){
        $dados = array(
                array('nome'=>'Salvador, Ba', 'id' => 1),
                array('nome'=>'Lauro de Freitas, Ba', 'id' => 2),
            );
        
        $this->getjson($dados);
    }
		
}
?>