<?php

/* cargar librerias */
require_once '../vendor/autoload.php';
require_once '../models/ListSuperhero.php';
// require_once '../controllers/qrsuperhero.php';



/* espacio de nombres */

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    ob_start();

    $superhero = new Superhero();


    /* contenido (archivos externos) */
    // include dirname(__FILE__).'/res/example08.php';
    // echo "<h1> PDF con PHP  \nhola mundo</h1>";
    // estilos
    require_once './estilos.html';


    // datos backend
    $fechaActual = date("m-d-Y");
    // $datosSH = $superhero->getAll(['publisher_name' => 'Microsoft']);
    // forma 1: el publisher_id sera enviado desde la vista
    // $titulo = $_GET['publisher_name'];
    // forma 2: el publisher_id se obtiene de datosSH
    // <?php echo $datosSH[0]['publisher_name'];
    $dataQR = $_GET['imagen'];
    // $dataQR = "../../view/qrsuperhero/superheroqid=336.png/";
    $sh_name = $_GET['name'];
    // $name = $_GET['name'];

    // $prueba = "../view/imagenes/20240507205932.png";


    $datosSH = $superhero->getDataId(['idSuperhero' => $_GET['id']]);


    require './contenido-qr.php';
    $content = ob_get_clean();

    /* cnfiguracion PDF */
    /* Html2Pdf('P | L', 'A4', 'fr', true, 'UTF-8', array(margenes)); */
    $html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', array(15, 15, 15, 15));
    $html2pdf->writeHTML($content);
    $html2pdf->output('PDF-generado-PHP.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
