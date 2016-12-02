<?php 

class ProfileController extends Controller {
	
    function __construct(){
        $this->auth = true;               
        parent::__construct();

    }

    function index($id = false){
        
select * from poesias p 
Join usuarios u on u.id = p.idUsuario
Join relacionamentos r 
on (u.id = r.idConvidador or u.id = r.idConvidado)   
where p.dataCriacao between '2016-09-20 07:16:06' and now()
Order by p.dataCriacao DESC;
        $this->loadModels('PoesiasDAO', 'DAO');
        $this->loadModels('ComentariosDAO', 'DAO');
        $this->loadModels('RelacionamentosDAO', 'DAO');
        $this->loadModels('UsuariosDAO', 'DAO');
        
        $this->loadModels('UsuariosModel');
        $this->loadModels('PoesiasModel');
        $this->loadModels('StatusModel');
        $this->loadModels('RelacionamentosModel');
        
        
        $poesiaDAO = new PoesiasDAO();
        $usuarioDao = new UsuariosDAO();    
        $usuario = Login::getUserSession();
        $comentarios = new ComentariosDAO(); 
        $relacionamentosDAO = new RelacionamentosDAO();
        
        $visitante = false;
        $souAmigo = false;
        $souEu = null;
        $status = null;
        $souUsuarioConvidador = null;
       
        $poeta = new UsuariosModel();
        if($id){
            $infoPoeta = $usuarioDao->consultarUsuario($id);
            $poeta->setId($id);
            //$poeta->setNome($infoPoeta->nome);
            //$poeta->setSobrenome($infoPoeta->sobrenome);
            //$poeta->setPseudonimo($infoPoeta->pseudonimo);
            $poeta->setPoesias($poesiaDAO->obterPoesiasPorUsuario($id));
            $poeta->setAmigos($relacionamentosDAO->obterAmigosPorUsuario($id));
        
            //verificar se existe amizade entre o usario visitante e o usuario visitado
            $relacionamento = $relacionamentosDAO->verificarAmizadeVisitante($id , $usuario);
            
            if(!empty($relacionamento)){
                $souAmigo = true;
                $st = $relacionamento->status;
                $souUsuarioConvidador = $relacionamentosDAO->saberSeUsuarioConvidador($usuario->getId(), $id);
                if($st == StatusModel::STATUS_CONVITE_ENVIADO){
                    $status = "Pendente"; 
                }elseif ($st == StatusModel::STATUS_CONVITE_ACEITO){
                    $status = "Aceito";
                }else{
                    $souAmigo = false;
                }
                
            }
            
        }else{
            $souEu = true;
            $poeta = $usuarioDao->consultarUsuario($usuario->getId());
            //$poeta->setId($usuario->getId());
            //$poeta->setNome($infoPoeta->nome);
            //$poeta->setSobrenome($infoPoeta->sobrenome);
            //$poeta->setPseudonimo($infoPoeta->pseudonimo);
            $poeta->setPoesias($poesiaDAO->obterPoesiasPorUsuario($usuario->getId()));
            $poeta->setAmigos($relacionamentosDAO->obterAmigosPorUsuario($usuario->getId()));
        }
        
        
        //$this->view->setJs(array("poetas.js","ckeditor/ckeditor.js" , "poesias/poesias.js"));
        $this->view('index',array(
            //'poesias' => $poesias,
            'comentarios'=> $comentarios,
            'poeta'=> $poeta,
            //'relacionamentos' => $relacionamentos,
            'status' => $status,
            'souAmigo' => $souAmigo,
            'souEu' => $souEu,
            'souUsuarioConvidador' => $souUsuarioConvidador,
        ));
    }
    
    function verPerfil($id = false){
        $this->index($id);
    }
		
}
?>