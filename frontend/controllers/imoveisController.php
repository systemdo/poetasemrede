<?php 
/**
 * @property type $name Description
 */
class ImoveisController extends Controller {
   protected $css = array('detalhes_imoveis.css','jcarousel.connected-carousels.css');	
    
   function __construct(){
        parent::__construct(); 
        
    }

    function index(){
        
        $this->view->setCss($this->css);
        
        $imovel = $this->verDetalhesImovel(1);
        $this->view('detalhes_imoveis', $imovel);
    }
    
    function verDetalhesImovel($id){
        
    }
    function favoritos($i, $d){
        die($d);
    }
}
?>