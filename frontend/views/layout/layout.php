<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Poetas em Rede</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo $this->getPathCss() ?>/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo $this->getPathCss() ?>/redepoeta.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <header>
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header ">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand header-titulo" href="#">Poetas-Continue a Nadar</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <!--<form class="navbar-form navbar-left">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>-->



                        <ul class="nav navbar-nav navbar-right nav-principal">
                            <li><span><?php echo UserSystem::getPseudonimo()?></span></li>
                            <li><button title="Escrever uma nova Poesia" id="btn-escrever-poesia-header" class="btn btn-default btn-escrever-poesia">Estou Inspirado</button></li>
                            <li><a href="#"> <span class="glyphicon glyphicon-cloud icons-poesia icon-header-notificacao" aria-hidden="true" title="Quem gostou de seus poemas?"></span></a></li>
<!--                            <li>
                                <img class="img-circle"  src="<?php //echo SD::getUrlUpload() ?>/imgteste.jpg" alt="">
                            </li>-->
                            <li role="presentation"><a class="btn btn-default" href="<?php echo SD::getAppUrl() . '/login/logout' ?>">Sair</a></li>

                        </ul>

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </nav>
    </header>

    <div class="container-fluid">
        <div class="row conteudo-principal">

            <div class="col-md-2 menu-pessoal">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation" class="active"><a href="<?php echo SD::getAppUrl() ?>">Início</a></li>
                    <li role="presentation"><a href="<?php echo SD::getAppUrl() . '/profile' ?>">Profile</a></li>
                    <li role="presentation"><a href="<?php echo SD::getAppUrl() . '/poesias' ?>">Poesias</a></li>
                    <li role="presentation"><a href="<?php echo SD::getAppUrl() . '/amigos' ?>">Amigos</a></li>
                    <!--<li role="presentation"> <button title="Escrever uma nova Poesia" id="btn-escrever-poesia" class="btn btn-default btn-escrever-poesia">Estou Inspirado</button></li>-->
                    <li role="presentation">
                        <div class="btn-group">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Configurações<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li role=""><a href="<?php echo SD::getAppUrl() . '/usuarios/editar' ?>">Editar Perfil</a></li>
                                <li role=""><a href="<?php echo SD::getAppUrl() . '/usuarios/imagemPortada' ?>">Imagem de Portada</a></li>
                                <li role=""><a href="<?php echo SD::getAppUrl() . '/usuarios/imagemPerfil/' ?>">Imagem de Perfil</a></li>
                            </ul>
                        </div>
                    </li>
            </div>

            <!--<li role="presentation"><a href="#">Grupos</a></li>-->
            </ul>
           
        </div>

        <div class="grid-content">
            <div class="row">
                <?php echo $content ?>
            </div>
        </div>    
    </div><!--row-->
</div>    
<!-- /.container -->

<hr>

<!-- Footer -->
<footer>
    <div class="container">        
        <p>Copyright &copy; Lucas Silvério Marques <?php echo date('Y'); ?></p>
    </div>
</footer>

<div class="modal fade modal-poesia-content" id="modal-poesia-content" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-titulo-poesia"></h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
<script>
    var URL = "<?php echo SD::getAppUrl()?>";
</script>    

<!-- jQuery -->
<script src="<?php echo $this->getPathJS() ?>/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo $this->getPathJS() ?>/bootstrap.min.js"></script>
<script src="<?php echo $this->getPathJS() ?>/poetas.js"></script>
<script src="<?php echo $this->getPathJS() ?>/ckeditor/ckeditor.js"></script>
<script src="<?php echo $this->getPathJS() ?>/poesias/poesias.js"></script>
<script src="<?php echo $this->getPathJS() ?>/likes/likes.js"></script>

<script src="<?php echo $this->getPathJS() ?>/comentarios/comentarios.js"></script>

<?php $this->getJs() ?>

<script type="text/javascript">
    likes.eventLike();
    likes.eventTakeLike();
    likes.eventLikeComentarios();
    likes.eventTakeLikeComentarios();
    comentarios.eventComent();
    //comentarios.eventUpdateComent();
    comentarios.eventDeleteComent();

</script>



</body>

</html>
