<?php
//var_dump($relacionamentos);
if (!empty($relacionamentos)) {
    ?>
    <div class="col-md-12 col-sm-12 buscador">
        <!--<form class="navbar-form navbar-left">-->
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button class="btn btn-default">Procurar</button>
        <!--</form>-->
    </div>        

    <?php
    foreach ($relacionamentos as $key => $relacionamento) {
        ?>            
        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img class="img-circle img-responsive" src="http://placehold.it/40x40" alt="">
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
        <h1>Procure seu poeta favorito!</h1>
    </header>

    <?php
}
?>