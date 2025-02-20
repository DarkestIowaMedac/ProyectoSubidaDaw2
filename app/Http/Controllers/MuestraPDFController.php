<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;

class MuestraPDFController extends Controller
{
    public function generatePDF($id)
{
    $muestra = Muestra::with(['sede', 'formato', 'imagenes', 'interpretaciones'])->findOrFail($id);

    // Preparar las imágenes
    $imagenes = $muestra->imagenes->map(function ($imagen) {
        try {
            $imageContent = Http::get($imagen->ruta)->body();
            return [
                'id' => $imagen->id,
                'path' => $imagen->ruta,
                'base64' => base64_encode($imageContent),
                'zoom' => $imagen->zoom
            ];
        } catch (\Exception $e) {
            return [
                'id' => $imagen->id,
                'path' => $imagen->ruta,
                'base64' => null,
                'zoom' => $imagen->zoom
            ];
        }
    })->filter(function ($imagen) {
        return $imagen['base64'] !== null;
    });

    $pdf = PDF::loadView('pdf.muestra', [
        'muestra' => $muestra,
        'sede' => $muestra->sede,
        'formato' => $muestra->formato,
        'imagenes' => $imagenes,
        'interpretaciones' => $muestra->interpretaciones // Asegúrate de pasar las interpretaciones
    ]);

    $pdf->setOptions([
        'isRemoteEnabled' => true,
        'isHtml5ParserEnabled' => true,
        'defaultFont' => 'sans-serif'
    ]);

    return $pdf->download('muestra_' . $muestra->codigo . '.pdf');
    }
}