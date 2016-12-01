<?php
//var_dump($relacionamentos);
if (!empty($relacionamentos)) {
    ?>
    <?php
    foreach ($relacionamentos as $key => $relacionamento) {
        ?>            
        <div class="col-md-3 col-sm-6">
            <div class="thumbnail">
                <img class="img-circle img-responsive" src="<?php echo SD::getAppUrlPublicFiles() ?>/uploads/imgteste.jpg" alt="">
                <div class="caption">
                    <h3><?php echo $relacionamento->getNome() ?></h3>
                    <p><?php echo $relacionamento->getPseudonimo() ?></p>
                    <p>
                        <!--<a class="btn btn-primary" href="<?php //echo SD::getAppUrl() . '/profile/verProfile/' . $relacionamento->getNome() . '/' . $relacionamento->getId() ?>">Perfil</a>-->
                        <a class="btn btn-primary" href="<?php echo SD::getAppUrl() . '/profile/verProfile/' . $relacionamento->getNome() . '/' . $relacionamento->getId() ?>">Perfil</a>
                        <?php if (!empty($relacionamento->getStatus()) and $relacionamento->getStatus() == StatusModel::STATUS_CONVITE_ENVIADO) { ?>
                            <!--se foi ele que me convidou-->
                            <?php if ($relacionamento->idConvidador == $relacionamento->idUsuario) { ?>
                                        <button class="btn btn-primary btn-aceitar-convite" idRelacionamento="<?php echo $relacionamento->idRelacionamento ?>">Aceitar</button>
                            <?php } else { ?>
                                        <button class="btn btn-primary">Enviado</button>
                            <?php } ?> 
                                        
                        <?php } else { ?>
                            <button class="btn btn-primary btn-convidar" idConvidado="<?php echo $relacionamento->getId() ?>">Convite</button>
                        <?php } ?>
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