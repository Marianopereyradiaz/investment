<?php
    tcpdf();
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $title = "Fondo";
    $obj_pdf->SetTitle($title);
    $obj_pdf->SetHeaderData($title);
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $obj_pdf->SetFont('helvetica', '', 9);
    $obj_pdf->setFontSubsetting(false);
    $obj_pdf->AddPage();
    $id_user=$this->session->userdata("userid");
    $amounts=$this->session->userdata("amounts");
    $name=$this->session->userdata("fund_name");
    $currency=$this->session->userdata("fund_currency");
    $accumulated=$this->session->userdata("accumulated");
    ob_start();
?>
    <style>
        .table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        border: 1px solid black;
        padding: 2px;
        }
        .table tr {
            font-family: Arial, Helvetica, sans-serif;
            border: 1px solid black;
        }
        .table th {
            font-family: Arial, Helvetica, sans-serif;
            border: 1px solid black;
            font-weight: bolder;
            margin: 4px;
        }
        .table td {
            font-family: Arial, Helvetica, sans-serif;
            border: 1px solid black;         
        }
    </style>
    <h1 style="text-align:center">Estado de Fondo de Inversión</h1>
    <h2 style="text-align:center">Nombre del Fondo: <?php echo $name; ?></h2>
    <h3 style="text-align:center">Moneda: <?php echo $currency; ?></h2>
    <table class="table">
        <tr>
            <th>Fecha</th>
            <th>Monto</th>
            <th>Diferencia</th>
            <th>Porcentaje</th>
        </tr>
        <?php foreach($amounts as $a){ ?>
        <tr>
            <td><?php echo $a["date"]; ?></td>
            <td>$<?php echo $a["amount"]; ?></td>
            <td bgcolor="<?php if ($a["diff"]<0){
                echo "red";
            }else{
                    echo "LimeGreen";
                }
                ?>"
            >$<?php echo $a["diff"]; ?></td>           
            <td bgcolor="<?php if ($a["perc"]<0){
                echo "red";
            }else{
                    echo "LimeGreen";
                }
                ?>"
            ><?php echo $a["perc"]; ?>%</td>
        </tr>
        <?php } ?>
    </table>
    <h1 style="text-align:center">Total acumulado desde el inicio: $<?php echo $accumulated; ?></h1>
<?php
    $content = ob_get_contents();
    ob_end_clean();
    $obj_pdf->writeHTML($content, true, false, true, false, '');
    $obj_pdf->Output('output.pdf', 'I');
?>
