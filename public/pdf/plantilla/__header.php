<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?= $this->titulo ?></title>
    <link rel="stylesheet" href="public/pdf/assets/style.css" media="all" />
  </head>
  <body>
<header class="clearfix">
  <div id="logo">
    <img src="public/pdf/assets/logo.png">
  </div>
  <h1><?= strtoupper($this->titulo) ?></h1>

  <div id="project">
    
    <div><span>Usuario: </span> <?= $_SESSION["user"]["nombre"] ?></div>
    <div><span>Email: </span> <a href="mailto:john@example.com">john@example.com</a></div>
    <?php 
    $dias = [
        "Domingo",
        "Lunes",
        "Martes",
        "Miercoles",
        "Jueves",
        "Viernes",
        "Sábado"
    ];

    $meses = [
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre"
    ];
    ?>
    <div>
      <span>Fecha de emision: </span> 
      <?php 
      
        echo $dias[ date('w') ] . " , " . date('d') . " de " . $meses[ date('n')-1 ] . " del " . date('Y') . " - " . date('h:i A');
      ?>
    </div>
  </div>
</header>