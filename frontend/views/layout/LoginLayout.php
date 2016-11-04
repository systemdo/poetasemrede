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

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Poetas em Rede</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <form name="form_login" method="post" action="login/login" class="navbar-form navbar-right">
                        <div class="form-group">
                            <!--<label class="sr-only" for="exampleInputEmail3">Email address</label>-->
                            <input type="email" class="form-control" required="email" name="loginEmail" id="loginEmail" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <!--<label class="sr-only" for="exampleInputPassword3">Password</label>-->
                            <input type="password" class="form-control" required name="loginPassword" id="loginPassword" placeholder="Senha">
                        </div>
                        <!--<div class="checkbox">
                            <label>
                                <input type="checkbox"> Nunca te esquecerei meu amor!
                            </label>
                        </div>-->
                        <button type="submit" class="btn btn-default btn-login">Venha</button>
                    </form>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">

            <!-- Jumbotron Header -->
            <header class="jumbotron hero-spacer">
                <h1>Poetas em Rede!</h1>
                <p>Quero Juntos em uma rede o mundo possa viver em paz.</p>
                <p><a class="btn btn-primary btn-large btn-cadastro">Cadastre-se!</a>
                </p>
            </header>

            <hr>

            <!-- Title -->
            <div class="row">
                <div class="col-lg-12">
                    <h3>Alguns Poetas</h3>
                </div>
            </div>
            <!-- /.row -->

            <!-- Page Features -->
            <div class="row text-center">

                <div class="col-md-3 col-sm-6 hero-feature">
                    <div class="thumbnail">
                        <img class="img-circle" src="<?php echo SD::getUrlUpload()?>/imgteste.jpg" alt="">
                        <div class="caption">
                            <h3>Joao o Lirico </h3>
                            <p>Eu sou o poeta do amor.</p>
                            <p>
                                <a href="#" class="btn btn-primary">Ver Perfil</a> 
                            </p>
                        </div>
                    </div>
                </div>

              
            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Lucas Silvério Marques &copy; 2016</p>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.container -->
        <div class="modal fade modal-cadastro" id="modal-cadastro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalCadastro"><center>Sua chance de tentar salvar o mundo ou chorar por ele(a)!</center></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form name="cadastra_usuario" id="cadastrar_usuario">
                                <div class="col-md-6 form-cadastro"> 
                                    <label for="exampleInputEmail1">Nome </label>
                                    <input type="text" class="form-control input-lg" maxlength="50" name="nome" id="nome" required="required" placeholder="Nome">
                                </div>
                                <div class="col-md-6 form-cadastro">
                                    <label for="exampleInputEmail1">Pseudonimo</label>
                                    <input type="text" class="form-control input-lg" maxlength="60" name="pseudonimo" required id="pseudonimo" placeholder="Pseudonimo">
                                </div>
                                <div class="col-md-7 form-cadastro">  	 
                                    <label for="exampleInputEmail1">Sobrenome</label>
                                    <input type="text" class="form-control input-lg" maxlength="300" name="sobrenome" required id="sobrenome" placeholder="Sobrenome">
                                </div>
                                <div class="col-md-5 form-cadastro">      
                                    <!-- <label for="exampleInputEmail1">Principio de Sua existência</label> -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">Dia</label>    
                                            <select required name="nascimento-dia" id="" class="form-control input-lg"><option>21</option></select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">Mês</label>    
                                            <select name="nascimento-mes" class="form-control input-lg"><option>02</option></select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Ano</label>    
                                            <select name="nascimento-ano" class="form-control input-lg"><option>1986</option></select>
                                        </div>
                                    </div>
                                </div>                   				  
                                <div class="col-md-6 form-cadastro">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" required="email" class="form-control input-lg" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="col-md-6 form-cadastro">
                                    <label for="exampleInputEmail1">Confirme Email</label>
                                    <input type="email" required="email" class="form-control input-lg" name="confirm_email" id="confirm_email" placeholder="Tenha certeza que seu email Email está certo">
                                </div>
                                <div class="col-md-6 form-cadastro">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" required class="form-control input-lg" name="senha" id="senha" placeholder="Senha">
                                </div>
                                <div class="col-md-6 form-cadastro">
                                    <label for="exampleInputPassword1">Não esqueça isso!</label>
                                    <input type="password" required class="form-control input-lg" name="confirm_senha" id="confirm_senha" placeholder="Repitindo a Senha">
                                </div>
                                <!--<div class="col-md-6 form-cadastro">
                                    <label for="exampleInputFile">Coloque uma imagem que mais pareça com você</label>
                                    <input type="file" id="img-form">
                                    <p class="help-block"></p>
                                </div>--> 
                        </div>    
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btn-cadastrar-usuario" class="btn btn-primary">Juntar-se!</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo $this->getPathJs() ?>/jquery.js"></script>
        <!--<script src="frontend/web/js/jquery.js"></script>-->


        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo $this->getPathJs() ?>/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.btn-cadastro').click(function () {
                    $('#modal-cadastro').modal('show');
                });
                
                //$('#btn-cadastrar-usuario').click(function (e) {
                    $('#cadastrar_usuario').submit(function (e) {
                    
                        e.preventDefault();
                    $.post( 'usuarios/cadastrarUsuarios/cadastrar-usuario', 
                            $("#cadastrar_usuario").serialize(), 
                            function(dados){})
                            .done(function(dados) {
                                console.debug(dados);
                          if(dados.resposta){
                                alert('Você está na Rede');
                                location.reload();    
                          }else{
                              alert(dados.mensagem);
                          }
                    });
                    return false;   
                });
                
            });
        </script>

    </body>

</html>
