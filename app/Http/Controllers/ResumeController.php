<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Svg\Tag\Rect;

class ResumeController extends Controller
{
    public function generatePdf(Request $request)
    {
        // return view('ansh-resume');
        // return view('rahul-resume');
        // return view('nikku-resume');
        $view = 'rahul-resume';
        if ($request->has('resume')) {
            $view = $request->resume;
        }

        $pdf = Pdf::loadView($view); // Load the Blade view
        return $pdf->download($view . '.pdf'); // Download as PDF
    }
}
