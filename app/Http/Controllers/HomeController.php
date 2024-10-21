<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pdf = Pdf::loadView('fmr.fmr_report1');
        return $pdf->download('fmr_report1.pdf');
        return view('home');
    }

    function testAny(){
        echo "in test function";
        exit;
    }
}
