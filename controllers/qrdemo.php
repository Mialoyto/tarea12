<?php

// MODELO, LIBRERIA QUE GENERA QR

require_once '../dist/phpqrcode/phpqrcode/qrlib.php';

if(isset($_GET['operacion'])){
  if($_GET['operacion'] == 'QR'){
    // crear QR
    // Calidad : L (low) , M(medium), H(Height), B(best)
    // los dos ultimos valores TAMAÑO, TAMAÑO_MARCO
    QRcode::png($_GET['texto'], 'qr3.png',$_GET['calidad'],$_GET['tamano'], $_GET['marco']);
    
  }
}
// 