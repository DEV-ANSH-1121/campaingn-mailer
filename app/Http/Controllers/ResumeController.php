<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Svg\Tag\Rect;

class ResumeController extends Controller
{
    public function generatePdf(Request $request)
    {
        return view('rahul-resume');
        $view = 'nikku-resume';
        if ($request->has('resume')) {
            $view = $request->resume;
        }

        $pdf = Pdf::loadView($view); // Load the Blade view
        return $pdf->download('Sumit_Kumar_Resume.pdf'); // Download as PDF
    }
}
