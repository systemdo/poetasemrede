<div class="col-md-12 fotos-perfil">
    <img width="600px" height="400px" class="img-portada" src="<?php echo UserSystem::getPathPortadaImageUser() ?>" >
    <div class="img-thumb">
        <img style="" class="img img-circle" src="<?php echo UserSystem::getPathThumbImageUser() ?>" >
    </div>
</div>
<style type="text/css">
    .panel-poesia{
        width: 100%;
        float:none;
        margin-left: 0px;
    }
</style>
<div class="col-md-12 ">
    <div class="col-md-8">
        
        <?php
        if($souEu){
             $this->getSliceView('poesias/index', array('poesias' => $poeta->getPoesias(), 'comentarios' => $comentarios, 'comentariosLikeDao' => $comentariosLikeDao));
        }
        elseif ($souAmigo AND $status == 'Aceito') {
            $this->getSliceView('poesias/index', array('poesias' => $poeta->getPoesias(), 'comentarios' => $comentarios , 'comentariosLikeDao' => $comentariosLikeDao));
        }elseif ($status == 'Pendente') {
            //troco o html caso quem convidou foi o usuario da sessao que está visitando o perfil
            if(!$souUsuarioConvidador){
            ?>           
                <button class="btn btn-primary btn-aceita-convite" idRelacionamento="<?php echo $relacionamento->idRelacionamento ?>">Aceitar Convite</button>
             <?php
             }else{ ?>
                <span>Convite já foi enviado. Aguarde a resposta</span>
             <?php 
            } 
            
        }else {
            ?>
                <button class="btn btn-primary btn-convidar" idConvidado="<?php echo $relacionamento->id ?>">Enviar Convite</button>
            <?php
        }
        ?>
    </div>
    <div class="col-md-2">

        <?php
        $relacionamento = $poeta->getAmigos();
        if (!empty($relacionamentos)) {
            foreach ($relacionamentos as $amigo) {
                ?>
                <div class="col-md-3">
                    <a href="<?php echo SD::getAppUrl() . '/profiles/verPerfil/' . $amigo->getPseudonimo() . '/' . $amigo->getId() ?>">
                        <div class="col-md-12">
                            <img width="100%" class="img" src="<?php echo SD::getAppUrlPublicFiles() ?>/uploads/imgteste.jpg" >
                        </div>
                        <div class="col-md-12">
                            <?php echo $amigo->nome ?>
                        </div>
                    </a>    
                </div>
            <?php }
        } else{
            if($souEu){
            ?>
            <a href="<?php echo SD::getAppUrl() . '/amigos' ?>" class="btn btn-primary">Procurar Amigos</a>
        <?php 
            
            } 
        
            } ?>

    </div>        
</div>
