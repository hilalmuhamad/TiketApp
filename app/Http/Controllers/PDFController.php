<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF; // Import DOMPDF

class PDFController extends Controller
{
    public function download()
    {
        $data = [
            'home_team' => 'PSIS SEMARANG',
            'away_team' => 'PERSIB BANDUNG',
            'home_score' => 0,
            'away_score' => 1,
            'location' => 'JATIDIRI',
            'date' => '09 Februari 2025',
            'time' => '19:00 WIB'
        ];

        $pdf = PDF::loadView('pdf.match_result', $data);
        return $pdf->download('hasil-pertandingan.pdf');
    }
}
