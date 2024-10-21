<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade\PDF;
 use PDF;


class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $data = [
            'title' => 'Test- PDF',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('myPDF', $data);
    
        return $pdf->download('test.pdf');
    }
}