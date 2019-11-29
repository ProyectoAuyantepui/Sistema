<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'public/vendor/autoload.php';
require 'libs/php-mailer/src/Exception.php';
require 'libs/php-mailer/src/PHPMailer.php';
require 'libs/php-mailer/src/SMTP.php';

class CorreoAuyantepui extends PHPMailer{

	public $nombre_plantilla;
	public $data;
	public $asunto;
	public $plantilla;
	public $destinatario;


	public function cargarConfiguracion(){

		$this->SMTPDebug = false;                        
		$this->isSMTP();                             
		$this->Host = 'smtp.gmail.com';  			 
		$this->SMTPAuth = true;                      
		$this->Username = 'uptaebauyantepui@gmail.com'; 
		$this->Password = 'auyantepuiSystem2019';                
		$this->SMTPSecure = 'tls';                 
		$this->Port = 587;                          
		$this->addReplyTo('uptaebauyantepui@gmail.com', 'Sistema Auyantepui');
		$this->isHTML(true); 										
		$this->setFrom('uptaebauyantepui@gmail.com', 'Sistema Auyantepui'); 		
	}

	public function construirCuerpoEmail(  ){

		ob_start();
		require_once "public/mail/" . $this->nombre_plantilla . ".php";
		$this->plantilla = ob_get_clean();
		$this->Subject = $this->asunto; 
		$this->Body    = $this->plantilla;
		$this->AltBody = $this->plantilla;
	}

	public function enviarEmail(){

		$this->cargarConfiguracion(); 
		$this->addAddress( 
		    $this->destinatario["correo"], 
		    $this->destinatario["nombre"]
		); 	
		    
		$this->construirCuerpoEmail();	


		if ( $this->send() ) {

			return [
		    	"operacion" => true,
		    	"destinatario" => $this->destinatario["correo"] 
		    ];
		    exit();
		}else{

			return [
				"operacion" => false,
				"destinatario" => $this->destinatario["correo"] 
			];
			exit();
		}
	}
}



