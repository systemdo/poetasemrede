<?php
//var_dump($relacionamentos);
$usuario = Login::getUserSession();
if (!empty($relacionamentos)) {
    die("he");
    foreach ($relacionamentos as $key => $amigo) {
        ?>            
        <div class="col-md-3 col-sm-6">
            <div class="thumbnail">
                <img class="img-circle img-responsive" src="<?php echo SD::getAppUrlPublicFiles() ?>/uploads/imgteste.jpg" alt="">
                <div class="caption">
                    <h3><?php echo $amigo->getNome() ?></h3>
                    <p><?php echo $amigo->getPseudonimo() ?></p>
                    <p align="center">
                        <!--<a class="btn btn-primary" href="<?php //echo SD::getAppUrl() . '/profile/verProfile/' . $relacionamento->getNome() . '/' . $relacionamento->getId()  ?>">Perfil</a>-->
                        <a class="btn btn-primary" href="<?php echo SD::getAppUrl() . '/profile/verProfile/' . $amigo->getId() ?>">Perfil</a>

                        <button class="btn btn-primary btn-convidar" idConvidado="<?php echo $relacionamento->getId() ?>">Convite</button>

                    </p>
                </div>
            </div>
        </div>

<?php
    }
} else {
    ?>

    <p class="sem-amigos">Procure seu Poeta Faforito!</p>

<?php
}
?>