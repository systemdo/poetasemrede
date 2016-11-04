<?php
var_dump($relacionamentos);
if (!empty($relacionamentos)) {
    ?>
    <?php
    foreach ($relacionamentos as $key => $relacionamento) {
        ?>            
        <div class="col-md-3 col-sm-6">
            <div class="thumbnail">
                <img class="img-circle img-responsive" src="<?php echo SD::getAppUrlPublicFiles()?>/uploads/imgteste.jpg" alt="">
                <div class="caption">
                    <h3><?php echo $relacionamento->nome ?></h3>
                    <p><?php echo $relacionamento->pseudonimo ?></p>
                    <p>
                         <a class="btn btn-primary" href="<?php echo SD::getAppUrl() . '/profile/index/'.$relacionamento->nome.'/'. $relacionamento->id?>">Perfil</a>
                         <?php //if(empty($relacionamento->convidador) or empty($relacionamento->convidado)){?>
                         <button class="btn btn-primary btn-convidar" idConvidado="<?php echo $relacionamento->id?>">Convite</button>
                         <?php //} ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
    }
    
} else {
    ?>
    <header class="jumbotron hero-spacer">
        <h1>Nenhum resultado encontrado!</h1>
    </header>

    <?php
}
?>