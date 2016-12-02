<?php
//var_dump($relacionamentos);
$usuario = Login::getUserSession();
if (!empty($relacionamentos)) {
    ?>
    <?php
    foreach ($relacionamentos as $key => $relacionamento) {
        $amigo =  $relacionamento->getAmigos();
        ?>            
        <div class="col-md-3 col-sm-6">
            <div class="thumbnail">
                <img class="img-circle img-responsive" src="<?php echo SD::getAppUrlPublicFiles() ?>/uploads/imgteste.jpg" alt="">
                <div class="caption">
                    <h3><?php echo $amigo->getNome() ?></h3>
                    <p><?php echo $amigo->getPseudonimo() ?></p>
                    <p align="center">
                        <!--<a class="btn btn-primary" href="<?php //echo SD::getAppUrl() . '/profile/verProfile/' . $relacionamento->getNome() . '/' . $relacionamento->getId() ?>">Perfil</a>-->
                        <a class="btn btn-primary" href="<?php echo SD::getAppUrl() . '/profile/verProfile/'.$amigo->getId() ?>">Perfil</a>
                        <?php if (!empty($relacionamento->getStatus()) and $relacionamento->getStatus() == StatusModel::STATUS_CONVITE_ENVIADO) { ?>
                            <!--se foi ele que me convidou-->
                            <?php if ($relacionamento->getConvidador()->getIdConvidador() == $usuario->getId()) { ?>
                                        <button class="btn btn-primary btn-aceitar-convite" idRelacionamento="<?php echo $relacionamento->getId() ?>">Aceitar</button>
                            <?php } else { ?>
                                        <button class="btn btn-primary">Enviado</button>
                            <?php } ?> 
                                        
                        <?php } /*} else($relacionamento->getStatus() == StatusModel::STATUS_CONVITE_ACEITO) { ?>
                                   <!-- já são amigos-->     
                        <?php } /*else{ 
                        ?>                
                            <!--se não é amigo-->            
                            <button class="btn btn-primary btn-convidar" idConvidado="<?php echo $relacionamento->getId() ?>">Convite</button>
                        <?php } */ ?>
                    </p>
                </div>
            </div>
        </div>

        <?php
    }
} else {
    ?>

    <p class="sem-amigos">Querido poeta, nessa vida não existe vida se a vida não é acompanhada por outra vida!</p>

    <?php
}
?>