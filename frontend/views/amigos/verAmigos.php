<?php
//var_dump($relacionamentos);
if (!empty($relacionamentos)) {
    ?>
    <?php
    foreach ($relacionamentos as $key => $relacionamento) {
        ?>            
        <div class="col-md-3 col-sm-6">
            <div class="thumbnail">
                <img class="img-circle img-responsive" src="frontend/web/uploads/imgteste.jpg" alt="">
                <div class="caption">
                    <h3><?php echo $relacionamento->nome ?></h3>
                    <p><?php echo $relacionamento->pseudonimo ?></p>
                    <p>
                        <a href="perfil/verPerfilAmigo/<?php echo $relacionamento->idUsuario ?>" class="btn btn-primary">Ver Perfil</a> 
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