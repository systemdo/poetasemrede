<?php //echo $content;die();?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Imobiliaria</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->getPathCss()?>/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $this->getPathCss()?>/icon/material-icons.css" rel="stylesheet">


    <link href="<?php echo dirname($this->getPathCss())?>/js/bibliotecas/multiple-select/multiple-select.css" rel="stylesheet"/>

    <!-- <link rel="stylesheet" type="text/css" href="js/bibliotecas/carousel_skeleton/jcarousel.skeleton.css"> -->
        <link rel="stylesheet" type="text/css" href="frontend/web/js/bibliotecas/thumbnail-scroller-master/jquery.mThumbnailScroller.css">
        <?php $this->getCss()?>

    <link href="<?php echo $this->getPathCss()?>/app.css" rel="stylesheet">
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

  
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <nav class="navbar navbar-default navbar-static-top header">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Imobiliaria</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="#"> 
                  <i class="material-icons">call</i>(71) 3226-9856
                </a>
            </li>
            <li>
                <a href="#"> 
                  <img src="<?php echo SD::getAppUrl()?>/img/icon-whatsapp.png"> (71) 99116-1216
                </a>
            </li>
            <li>
                <a href="favorito"><i class="material-icons">star<!--<span class="badge">14</span>--></i></a>
                <!-- <i class="material-icons">ic_star_border</i> -->
            </li>
            <li>
                <a href="#"><i class="material-icons">date_range</i></a>
                <!-- <i class="material-icons">ic_star_border</i> -->
            </li>
            
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Digite seu CPF">
                </div>
                <button type="submit" class="btn btn-default btn-app">Entrar </button>
              </form>
          </li>
          
          </ul>
        </div><!-- /.navbar-collapse -->
      </div>
    </nav>
    <nav class="navbar navbar-default navbar-static-top navbar-filtros">
      <div class="filtros">
          <div class="row">
                <div class="col-lg-3 grid-select-filtro">
                      <select multiple="multiple" id="select-cidades" class="form-control cidades select-filtros">
                          
                      </select>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-3 grid-select-filtro">
                      <select multiple="multiple" id="select-bairros" class="form-control  select-filtros">
                          
                      </select>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-3 grid-select-filtro">
                      <select multiple="multiple" id="select-acao" class="form-control  select-filtros">
                          
                      </select>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-3 grid-select-filtro">
                      <select multiple="multiple" id="select-valores" class="form-control  select-filtros">
                         
                      </select>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-3 grid-select-filtro">
                      <select multiple="multiple" id="select-quartos" class="form-control  select-filtros">
                         
                      </select>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-3 grid-select-filtro">
                      <select multiple="multiple" id="select-area" class="form-control select-filtros">
                          
                      </select>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-3 grid-select-filtro">
                      <select multiple="multiple" id="select-vagas" class="form-control select-filtros">
                          
                      </select>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-3 grid-select-filtro">
                      <select multiple="multiple" id="select-mobiliado" class="form-control select-filtros">
                          
                      </select>
                </div><!-- /.col-lg-6 -->
      </div>
      </div>
    </nav>
            <?php echo $content?>
        
  
 

   
      <footer>
        <p>&copy; 2016 Lucas Silvério, Inc.</p>
      </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $this->getPathJS()?>/jquery.js"></script>
    <script src="<?php echo $this->getPathJS()?>/bootstrap.min.js"></script>
    <!-- <script src="js/jquery.v3.js"></script> -->
     
    <script src="<?php echo $this->getPathJS()?>/bibliotecas/multiple-select/multiple-select.js"></script>
    <script src="<?php echo $this->getPathJS()?>/select.js"></script>
    <script src="<?php echo $this->getPathJS()?>/mapa.js"></script>
    <!--  <script type="text/javascript" src="js/jquery.jcarousel.js"></script> -->
    <!-- <script src="js/bibliotecas/carousel_skeleton/jcarousel.skeleton.js"></script> -->
    <script src="<?php echo $this->getPathJS()?>/bibliotecas/thumbnail-scroller-master/jquery.mThumbnailScroller.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAT_TfutYjoBi8Ks49Vb6dOP5a3ZBywOPA&callback=initMap&language=pt-BR&region=BR" async defer></script>
   
    
        <script>
            select.inicialize();
            
          $(function() {
              $(".jcarousel").mThumbnailScroller({
                type:"click-50",
                //theme:"buttons-out",
                axis:"y"
              });
          });
      </script>


  </body>
</html>
