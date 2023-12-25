<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'third_party/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
use Dompdf\Options;

function pdf_create($html, $filename = '', $stream = TRUE, $set_paper = '', $attach = null, $folder_name = null){

    $options = new Options();
    $options->set('defaultFont', 'dejavusanscondensed');
    $options->set('isRemoteEnabled', true);
    $options->set('isHtml5ParserEnabled', true);
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);

    $dompdf->setPaper("a4", "portrait");
    $dompdf->render();

    if ($stream) {
        $pdf_string = $dompdf->output();
        if (!empty($attach)) {
            if (!empty($folder_name)) {
                $folder = "backend/" . $folder_name . '/' . $filename . ".pdf";;
            } else {
                $folder = "backend/store/" . $filename . ".pdf";;
            }
            file_put_contents($folder, $pdf_string);
        } else {
            $dompdf->stream($filename . ".pdf");
        }
    } else {
        return $dompdf->output();
    }
}
