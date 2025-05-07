<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Svg\Tag\Rect;

class ResumeController extends Controller
{
    public function generatePdf(Request $request)
    {
        $view = 'resumes.' . $request->get('resume', 'ansh-resume');
        $pdf = Pdf::loadView($view); // Load the Blade view
        return $pdf->download($view . '.pdf'); // Download as PDF
    }
}
