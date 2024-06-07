<?php

namespace App\Http\Controllers;

use App\Models\BookingOlahraga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\PDF;
use App\Models\User;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $data = BookingOlahraga::all();

        dd($data);

        $pdf = Pdf::loadView('pdf_view', $data);

        return $pdf->download('laporan.pdf');
    }
}
