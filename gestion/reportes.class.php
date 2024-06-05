<?php
include __DIR__.'/sistema.clase.php';
require '../vendor/autoload.php'; 
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

Class Reportes extends Sistema{ 
    function productos(){
    try {
        $this->connect();
        $sql= "SELECT p.id_producto, m.marca, p.nombre,p.precio,p.costo
        from productos p join marcas m on p.id_marca=m.id_marca
        order by 2,3;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos=array();
        $datos=$stmt->fetchAll();
        include __DIR__.'/vistas/reportes/productos.php';
        ob_start();
        $html2pdf = new Html2Pdf('P', 'A4', 'fr');
        $html2pdf->writeHTML($content);
        $html2pdf->output('productos.pdf');
        } catch (Html2PdfException $e) {
        $html2pdf->clean();
        $formatter = new ExceptionFormatter($e);
        echo $formatter->getHtmlMessage();
        }
    }
    function marcas(){
    try {
        $this->connect();
        $sql= "SELECT m.id_marca, m.marca, count(p.id_producto) as productos
        from marcas m join productos p on p.id_marca=m.id_marca
        group by 1,2
        order by 2;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos=array();
        $datos=$stmt->fetchAll();
        include __DIR__.'/views/reportes/marcas.php';
        ob_start();
        $html2pdf = new Html2Pdf('P', 'A4', 'fr');
        $html2pdf->writeHTML($content);
        $html2pdf->output('marcas.pdf');
        } catch (Html2PdfException $e) {
        $html2pdf->clean();
        $formatter = new ExceptionFormatter($e);
        echo $formatter->getHtmlMessage();
        }
    }
}
?>