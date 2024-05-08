<?php

/* cargar librerias */
require_once '../vendor/autoload.php';
require_once '../models/Superhero.php';
// require_once '../models/Publisher.php';

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
      $titulo = $_GET['publisher_name'];
  // forma 2: el publisher_id se obtiene de datosSH
  // <?php echo $datosSH[0]['publisher_name'];
 /*  $datosSH = $superhero->getFilter(
    ['publisher_id' => $_GET['publisher_id']],
    ['gender_id' => $_GET['publisher_id']],
    ['limite' => $_GET['publisher_id']],
  );   */


      $datosSH = $superhero->getFilter(
        ['publisher_id' =>$_GET['publisher_id'],
        'gender_id' => $_GET['gender_id'],
        'limite' => $_GET['limite']
        ]
      );  
  

  

  require_once './contenido3.php';
  $content = ob_get_clean();

  /* cnfiguracion PDF */
  /* Html2Pdf('P | L', 'A4', 'fr', true, 'UTF-8', array(margenes)); */
  $html2pdf = new Html2Pdf('L', 'A4', 'es', true, 'UTF-8', array(15, 15, 15, 15));
  $html2pdf->writeHTML($content);
  $html2pdf->output('PDF-generado-PHP.pdf');
} catch (Html2PdfException $e) {
  $html2pdf->clean();

  $formatter = new ExceptionFormatter($e);
  echo $formatter->getHtmlMessage();
}