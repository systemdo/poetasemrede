<?php 

class MaisInfoController extends Controller {
	
    function __construct(){
        parent::__construct(); 
    }

    function index(){
        
        $this->view();
    }
    
    function conseguirAcao(){
        $dados = array(
                'Venda',
                'Aluguel',
        );
        $this->getJson($dados);
      
    }
    
    function conseguirValores(){
        $dados = array(
                        array('valor'=>'R$ 800,00 - R$ 5.000,00'),
                        array('valor'=>'R$ 5.000,00 - R$ 15.000,00'),
                );

        $this->getJson($dados);
        
    }
    function conseguirQuartos(){
        $dados = array(
						1,
						2,
						3,
						4,
						'Mais que 4'
					);

        $this->getJson($dados);
        
    }
    function conseguirVagas(){
        $dados = array(
						1,
						2,
						3,
						4,
						'Mais que 4'
					);

        $this->getJson($dados);
        
    }
    function conseguirMobiliado(){
        $dados = array(
                        'Sim',
                        //'Não'
                    );
        $this->getJson($dados);
        
    }
    function conseguirArea(){
        $dados = array(
                array('valor'=>'800 m2 - 1.000 m2'),
                array('valor'=>'2.000 m2 - 3.000 m2'),
        );
        $this->getJson($dados);
        
    }

		
}
?>