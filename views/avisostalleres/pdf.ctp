<?php
ob_start();
error_reporting(E_ALL);
App::import('Vendor','tcpdf');
$tcpdf = new TCPDF();
$textfont = 'freesans';
$tcpdf->SetCreator(PDF_CREATOR);
$tcpdf->SetAuthor("autor");
$tcpdf->SetTitle("Título");
$tcpdf->SetSubject("Subtítulo");
$tcpdf->setPrintHeader(false);
$tcpdf->setPrintFooter(false);
$tcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$tcpdf->AliasNbPages();
$tcpdf->AddPage();
?>
<style>
    div {
        font-size: 25px;
    }
    h3 {
        font-size: 28px;
    }
    div#datos_cliente {border: 1px solid black;}
    div#datos_aviso {border: 1px solid black;}
</style>

<div id="datos_cliente">
    <?php echo $aviso['Cliente']['nombre']; ?>-<?php echo $aviso['Cliente']['id']; ?> <br/>
    C.I.F.: <?php echo $aviso['Cliente']['cif'] ?>
</div>
<!-- Datos del aviso -->

<div id="datos_aviso">
    <table>
        <tr>
            <td colspan="2"><h4>AVISO DE TALLER</h4></td>
        </tr>
        <tr>
            <td>Centro de trabajo: </td>
            <td><?php echo $aviso['Centrostrabajo']['centrotrabajo']; ?></td>
        </tr> 
        <tr>
            <td>Máquina: </td>
            <td><?php echo $aviso['Maquina']['nombre']; ?></td>
        </tr>
        <tr>
            <td>Estado: </td>
            <td><?php echo $aviso['Estadosavisostallere']['estado'] ?></td>
        </tr>
        
        <tr>
            <td>Fecha: </td>
            <td><?php echo $aviso['Avisostallere']['fechaaviso']; ?></td>
        </tr>
    </table>
</div>

<?php
$html = ob_get_contents();
ob_end_clean();
$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output("AvisoTaller.pdf", "I"); //Muestra el pdf
//$tcpdf->Output("Articulos.pdf", "D"); //Fuerza la descarga del pdf
?>
