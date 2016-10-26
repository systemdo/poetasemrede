<?php 
Class Lang 
{
public $lang;

function __construct()
{
	if(isset($_COOKIE['lang']))
	{
		$this->lang = $_COOKIE['lang'];	
	}else 
			{
				 $this->lang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
				 
			}
	
}

function getLang()
{
	return $this->lang;
}


}
?>
