<?php 

class IndexController extends Controller {
	
    function __construct(){
        parent::__construct(); 
    }

    function index(){
        //GeneratorModels::loadGenerator();
        $this->loadModels(array('ClienteModel' , 'PerfilModel'));
        
        $cliente = new ClienteModel();
        var_dump($cliente->getId_cliente());
        $perfil = new PerfilModel();
        var_dump($perfil->getId());
        $this->view('index', array('casa' =>45, 'carro' => 55));
    }
		
}
?>