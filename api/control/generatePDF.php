<?php
require_once('../../vendor/autoload.php');

// plantilla
require_once('../../plantilla/index.php');

include('../helpers/conx.php');

// estilos
$css = file_get_contents('../../plantilla/style.css');


$mpdf = new \Mpdf\Mpdf([
    "format"=> "A4-P"
]);
$plantilla = get_sheet();
$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);


$mpdf->Output();