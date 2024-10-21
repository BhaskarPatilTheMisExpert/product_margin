<?php

namespace App\Http\Controllers\Admin;

use Barryvdh\DomPDF\Facade\Pdf;

class HomeController
{
    public function index()
    {
        //$pdf = Pdf::loadView('admin.fmr.fmr_report1');
       // $pdf->setOption(['isPhpEnabled' => true]);
       // return $pdf->download('fmr_report1.pdf');
        return view('home');
    }
}
