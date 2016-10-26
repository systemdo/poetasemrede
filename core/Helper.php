<?php 

function css($css = null, $url_alternativa = null)
{		
	$css_file = $css;
	$cath_css = '';
	
	$file_css = 'assets/css/'.$css_file.'.css';
	
	if(is_readable($file_css))
	{	
			
		$cath_css.= '<link href="http://sistema';
		//$cath_css.= Config::BaseUrl();
	
		if($url_alternativa != null)
		{
			$cath_css.= $url_alternativa;
		}
			$cath_css.='/assets/css/';
			$cath_css.= $css_file.'.css" ';
			$cath_css.= 'rel="stylesheet" type="text/css" /><br/>';
			echo $cath_css;
		
	
	}
	else
		{
			return  "Undefined File";
		}		
	
}

function js($js)
{		
	$js_file = $js;
	$cath_js = '';
	
	$file_js = 'assets'.DS.'js'.DS.$js_file.'.js';
	
	if(is_readable($file_js))
	{
		$cath_js.= '<script type="text/javascript"';
		$cath_js.=' src="assets/js/';
		$cath_js.= $js_file.'.js"></script><br/>';
		
		echo $cath_js;
		
	}
	else
		{
			return  "Undefined File";
		}		
	
}

function helper_url_lang($lang)
{
	$url_=Config::request(); 
	$url = APP_URL.'/'.$lang;
	if($url_['modulo'] != false)
			$url.= '/'.$url_['modulo'];
			
	if($url_['controller'] != '' && $url_['controller']!='index')
		$url.= '/'.$url_['controller'];
	
	if($url_['method'] != '' && $url_['method']!='index')
			$url.= '/'.$url_['method'];
			
	if($url_['arg'] != '' && $url_['arg']!= 'index')
			$url.= '/'.$url_['arg'];
	
	return $url;
}

function helper_build_url($controller)
{
	
	$url_=Config::request(); 
	$url = APP_URL;
	
	if($url_['lang'] != false)
			$url.= '/'.$url_['lang'];
			
	if($url_['modulo'] != false)
			$url.= '/'.$url_['modulo'];
			
	$url.= '/'.$controller;
	
	return $url;
}
?>