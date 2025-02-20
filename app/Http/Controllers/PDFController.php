<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $data = ['title' => 'Ejemplo de PDF con DomPDF'];
        $pdf = Pdf::loadView('pdf.document', $data);
        return $pdf->download('document.pdf');
    }
}