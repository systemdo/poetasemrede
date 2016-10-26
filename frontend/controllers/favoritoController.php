<?php 
class FavoritoController extends Controller {
   protected $css = array('favoritos.css');	
    
   function __construct(){
        parent::__construct(); 
        
    }

    function index(){
        
        $this->view->setCss($this->css);
        
        $favorito = $this->verFavorito(1);
        $this->view('index', $favorito);
    }
    
    function verFavorito($id){
        
    }
		
}
?>