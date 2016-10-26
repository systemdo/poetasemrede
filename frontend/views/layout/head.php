<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="BLM Sitios web diseño web">
<meta name="keywords" content="me leva que eu vou, meleva, brasil, argentina, cultura afrobrasileña, fiestas, bloco afro, samba, sambareggae, candomble, difusion, capoeira, orixas, danzas, musica, percusion, asociacion cultural, buenos aires" />
<meta name="description" content="Me leva que eu vou es una asociacion cultural de intercambio entre brasileños y argentinos.
									Organizamos eventos culturales para difundir la cultura brasileña y afrobrasileña en el pais.
									Queremos crear lazos entre los brasileños que viven en argentina para que sientan Brasil en Argentina." />
<meta name="title" content="Me Leva que eu vou">
<meta http-equiv="content-type" content="text/html;" charset="utf-8" >
	<title><?php //echo $header['title']?></title>

<script type="text/javascript">
var APP_URL = <?php echo json_encode(APP_URL)?>;
</script>

<link href="http://fonts.googleapis.com/css?family=Abel|Arvo|Montserrat|Lobster|Smokum|Source+Sans+Pro:600" rel="stylesheet" type="text/css" />

		
		<link href="<?php echo PATH_CSS?>bootstrap.css" rel="stylesheet">
    	<link href="<?php echo PATH_CSS?>bootstrap-responsive.css" rel="stylesheet">
    	<!--<link rel="stylesheet" href="<?php echo PATH_CSS?>jquery.bxslider.css" type="text/css" media="screen" />-->
		<link rel="stylesheet" href="<?php echo PATH_CSS?>style.css?=<?php echo rand();?>" type="text/css" />
		
		<link rel="icon" href="img/favicon.ico" type="image/x-icon" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo PATH_JS?>jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="<?php echo PATH_JS?>jquery.nivo.slider.js"></script>

		<script type="text/javascript" src="<?php echo PATH_JS?>jquery.js?=<?php echo rand();?>"></script>
	

<script type="text/javascript">

  /*var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35139482-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
*/
</script>


</head>
<body>
	<div id="fb-root"></div>
	<script>
		/*(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/es/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));*/
	</script>
<div id="wrap">	
	<div id="header">
		<div id="bannerUp">
			<div id="leftSide">
				<audio id="audio" controls="controls" style="width: 135px; margin-top: 3px; float: left; margin-right: 15px;" src="public/audios/Falsa Baiana.wav" autoplay loop>
					<source src="public/audios/Falsa Baiana.mp3" type="audio/mp3" />
					<source src="public/audios/Cobra Coral.mp3" type="audio/mp3" />			
				</audio>
				
				<div id="default_player_fallback"></div>
				<div class="fb-like" data-href="http://www.melevaqueeuvou.com.ar" data-send="false" data-layout="button_count" data-width="200" data-show-faces="false" data-colorscheme="dark"></div>
				<!--<div class="followFacebook" onclick="javascript:window.open('http://www.facebook.com/acmqv')">
					<div class="logoFacebook"></div>
					<div class="textoFacebook"><?//php echo $header['siguenosfb']?></div>
			    </div>-->
				<div class="g-plusone" data-size="small" data-width="300"></div>
				
			</div>
			<!--<div id="rightSide">
				<div id="banderas">
					<a href="<?php echo helper_url_lang('es')?>" class="band" id="es" title="<?php echo $header['idiomaEspanol']?>"></a>
					<a href="<?php echo helper_url_lang('pt')?>" class="band" id="pt" title="<?php echo $header['idiomaPortugues']?>"></a>
					<a href="<?php echo helper_url_lang('en')?>" class="band" id="en" title="<?php echo $header['idiomaIngles'] ?>"></a>
				</div>
			</div>-->
		</div>
		<div id="tituloPagina">
				<a href="#">
				<img id="imglogo" src="<?php echo PATH_IMG?>Logo.png" alt="Me leva que eu vou" />
				<h1 class="lobster">Me Leva que Eu Vou</h1>
				</a>
		</div>		
	</div>
	<div id="overlay" class="overlay" ></div>
	<div id="ventanaModal" class="ventanaModal" >
			<div class="nombreAlbumContainer">
				<div id="nombreAlbum" class="textoVentanaModal"></div>
			</div>
			<div id="cross" class="cross">
				<a id="AnchorCross" href="#"><img src="<?php echo PATH_IMG?>cross.png" alt=""/></a>
			</div>
			<div class="marco" id="marco_fotos">
				<img  id="fotos" class="imagenAlbum" src=""  alt="tocando" />
			</div>
			<div class="marco" id="marco_video" >
				<iframe id="video" width = "700px" height= "430px" src="" frameborder="0" allowfullscreen></iframe>
			</div>
			<div class="epigrafecontainer">
				<div class="epigrafe" id="epigrafefotos">
					<span id="fotoActual"> </span> de <span id="cantTotalFotos"></span>
				</div>
			</div>
			<div class="epigrafecontainer">
				<div class="epigrafe" id="epigrafevideos">
					<span id="titulo_video"> </span>
				</div>
			</div>
				<div id="bigPrevGalery" class="vectores">	
				<a class="pasar_img" id="l" href="#">
					<img src="<?php echo PATH_IMG?>prev.png" alt="" />
				</a>
			</div>
		
			<div id="bigNextGalery" class="vectores">
				<a class="pasar_img"  data-count="" id="r" href="#">
					<img src="<?php echo PATH_IMG?>next.png" alt=""/>
				</a>
			</div>
			
</div>
</div>
	<?php include_once 'menu.php';?>
<div id="content">