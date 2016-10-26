<?php 
class ContactController extends Controller {
	
	function __construct()
	{
		parent::__construct(); 
	}
	
	function index()
	{
		
		$this->view->catchView('contact');		
	}
	
	
	function envia_email()
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$mensaje = $_POST['mensaje'];
		if($this->checkEmail($email))
		{
		
			$destinatario = 'lukinhasmad@gmail.com';
			$asunto = $subject."| Contacto ME LEVA QUE EU VOU"; 
		
			//para el envío en formato HTML 
			$headers = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
			
			//dirección del remitente 
			$headers .= "From: Meleva  <lukinhasmad@gmail.com>\r\n"; 
			
			//dirección de respuesta, si queremos que sea distinta que la del remitente 
			$headers .= "Reply-To: \r\n"; 
			
			//ruta del mensaje desde origen a destino 
			$headers .= "Return-path: \r\n"; 
			
			//direcciones que recibián copia 
			$headers .= "Cc: \r\n"; 
			
			//direcciones que recibirán copia oculta 
			$headers .= "Bcc: \r\n";
			
			$cuerpo = '<table>
						<tr>
							<td style="background-color:#f0f0f0;height:30px">Nombre</td>
							<td style="background-color:#ffffff;height:30px">'.$name.'</td>
						</tr>
						<tr>
							<td style="background-color:#f0f0f0;height:30px">Email</td>
							<td style="background-color:#ffffff;height:30px">'.$email.'</td>
						</tr>
						<tr>
							<td style="background-color:#f0f0f0;height:30px">Mensaje</td>
							<td style="background-color:#ffffff;height:30px">'.$mensaje.'</td>
						</tr>
						
						
					   </table>';
				if(mail($destinatario,$asunto,$cuerpo,$headers))
				{
					$callback = true;
					$accion = helper_build_url('contact');
				}	   
		  
		}else
			{
				$callback = false;
				$accion = 'Email invalido';
			}	
			echo json_encode(array('callback' => $callback, 'accion' => $accion));
	}
	
	function checkEmail($email)
	{ 
				$mail_correcto = 0; 
				//compruebo unas cosas primeras 
				if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-	1,1) != "@")){ 
				 if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) { 
					 //miro si tiene caracter . 
					 if (substr_count($email,".")>= 1){ 
						 //obtengo la terminacion del dominio 
						 $term_dom = substr(strrchr ($email, '.'),1); 
						 //compruebo que la terminación del dominio sea correcta 
						 if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){ 
						 //compruebo que lo de antes del dominio sea correcto 
						 $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1); 
						 $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1); 
						 if ($caracter_ult != "@" && $caracter_ult != "."){ 
							 $mail_correcto = 1; 
						 } 
						 } 
					 } 
				 } 
			} 
			if ($mail_correcto) 
				 return true; 
				else 
				 return false; 
				
		}	
}
?>
