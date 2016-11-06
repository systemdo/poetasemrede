<?php 

class ProfileController extends Controller {
	
    function __construct(){
        $this->auth = true;               
        parent::__construct();

    }

    function index($nome = false, $id = false){
        $this->loadModels('PoesiasDAO', 'DAO');
        $this->loadModels('ComentariosDAO', 'DAO');
        $this->loadModels('RelacionamentosDAO', 'DAO');
        
        $poesiaDAO = new PoesiasDAO();
            
        $usuario = Login::getUserSession();
        $comentarios = new ComentariosDAO(); 
        $relacionamentosDAO = new RelacionamentosDAO();
        $visitante = false;
        if($id){
            $poesias = $poesiaDAO->obterPoesiasPorUsuario( $id);
            $relacionamentos = $relacionamentosDAO ->obterAmigosPorUsuarioPorLimite($id,6);
        }else{
            $poesias = $poesiaDAO->obterPoesiasPorUsuario( $usuario->getId());
            $relacionamentos = $relacionamentosDAO ->obterAmigosPorUsuarioPorLimite($usuario->getId(),6);
        }
        
        
        //$this->view->setJs(array("poetas.js","ckeditor/ckeditor.js" , "poesias/poesias.js"));
        $this->view('index',array(
            'poesias' => $poesias,
            'comentarios'=> $comentarios,
            'relacionamentos' => $relacionamentos,
            'visitante' => $visitante,
        ));
    }
		
}
?>