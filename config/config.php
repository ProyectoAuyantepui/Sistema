<?php 

$dias = [ "Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado" ];

$meses = [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ];

$config = [

    "name_app" => "Sistema Auyantepui",
    
    "directory" => dirname(__FILE__),
    "base_path" => dirname(__FILE__),
    "default_timezone" => "America/Caracas",
    
    "database" => [

      "driver"     => "pgsql",
      "host"     => "localhost",
      "port"     => "5432",
      "dbname"   => "horarios",
      "username" => "horarios",
      "password" => "123456"
    ],
    
    "mailer" => [

      "smtp_debug"      => false,                            
      "host"            => "smtp.gmail.com",        
      "smtp_auth"       => true,                      
      "username"        => "juaneliezer13@gmail.com", 
      "password"        => "25627918",               
      "smtp_secure"     => "tls",                  
      "port"            => 587,
      "reply_to_email"  => "juaneliezer13@gmail.com",
      "reply_to_name"   => "Information",           
      "from_email"      => "juaneliezer13@gmail.com",
      "from_name"       => "Mailer"
    ],

    "dia" => $dias[ date('w') ],

    "fecha" => date('d') . " de " . $meses[ date('n')-1 ] . " del " . date('Y'),

    "fecha_corta" => date('d-m-Y'),

    "hora" => date('h:i A'),

    "fecha_completa" => $dias[ date('w') ] . " , " . date('d') . " de " . $meses[ date('n')-1 ] . " del " . date('Y') . " - " . date('h:i A')
];