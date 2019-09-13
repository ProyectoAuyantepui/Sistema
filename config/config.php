<?php 

$dias = [ "Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado" ];

$meses = [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ];


if (isset($_SESSION['databaseRespaldo'])){
  $dbname=$_SESSION['databaseRespaldo'];  
}else{
  $dbname='horarios';
}

$config = [

    "name_app" => "Sistema Auyantepui",
    
    "directory" => dirname(__FILE__),
    "base_path" => dirname(__FILE__),
    "default_timezone" => "America/Caracas",
    
    "database" => [

      "driver"     => "pgsql",
      "host"     => "localhost",
      "port"     => "5432",
      "dbname"   => $dbname,
      "username" => "postgres",
      "password" => "543217"
    ],
    
    "mailer" => [

      "smtp_debug"      => false,                            
      "host"            => "smtp.gmail.com",        
      "smtp_auth"       => true,                      
      "username"        => "uptaebauyantepui@gmail.com", 
      "password"        => "auyantepuiSystem2019",               
      "smtp_secure"     => "tls",                  
      "port"            => 587,
      "reply_to_email"  => "yordyalejandro13@gmail.com",
      "reply_to_name"   => "Information",           
      "from_email"      => "yordyalejandro13@gmail.com",
      "from_name"       => "Mailer"
    ],

    "dia" => $dias[ date('w') ],

    "fecha" => date('d') . " de " . $meses[ date('n')-1 ] . " del " . date('Y'),

    "fecha_corta" => date('d-m-Y'),

    "hora" => date('h:i A'),

    "fecha_completa" => $dias[ date('w') ] . " , " . date('d') . " de " . $meses[ date('n')-1 ] . " del " . date('Y') . " - " . date('h:i A')
];