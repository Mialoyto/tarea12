<?php

// MODELO, LIBRERIA QUE GENERA QR

require_once '../dist/phpqrcode/phpqrcode/qrlib.php';

if (isset($_GET['operacion'])) {

  if ($_GET['operacion'] == 'QR') {
    // crear QR
    // Calidad : L (low) , M(medium), H(Height), B(best)
    // los dos ultimos valores TAMAÑO, TAMAÑO_MARCO
    $archivo = date("YmdHis") . ".png";
    // $aleatorio = rand(10, 100);
    $archivoEstatico = "SENATI.png";
    QRcode::png($_GET['texto'], "../view/imagenes/{$archivo}", $_GET['calidad'], 15, 3);
    // echo $archivo;

    echo "<img src= '../view/imagenes/{$archivo}'>";
  }
}
// QRcode::png("SENATI CHINCHA", " qr1.png","H", 10 , 5);