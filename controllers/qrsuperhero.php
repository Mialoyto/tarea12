<?php

// MODELO, LIBRERIA QUE GENERA QR

require_once '../dist/phpqrcode/phpqrcode/qrlib.php';
require_once '../models/ListSuperhero.php';



if (isset($_GET['operacion'])) {

    if ($_GET['operacion'] == 'superQR') {

        $id = $_GET['idsuperhero'];
        $archivo = "superheroqid=" . $id . ".png";
        $ruta = "../view/qrsuperhero/{$archivo}";
        QRcode::png($id, $ruta, $_GET['calidad'], 20, 3);


        // ruta original = echo "<img src= '../imagenes/{$archivo}'>";

        echo "<img src= '{$ruta}' style='max-width: 300px; max-height: 300px;'' >";
    }
}
// QRcode::png("SENATI CHINCHA", " qr1.png","H", 10 , 5);