<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Invoice;


class PdfController extends Controller
{
    public function pdfInvoice($invoice_id)
    {
        $company  = Company::all()->first();
        $invoice_id = (int) $invoice_id;
        $invoice = Invoice::where('id', $invoice_id)->with('client')->first();

        $pdf = \PDF::loadView('invoice', compact('company', 'invoice'));
        $pdf->setPaper('A4', 'portrain');
        return $pdf->stream('invoice');
    }

    public function downloadPdfInvoice($invoice_id)
    {
        $company  = Company::all()->first();
        $invoice_id = (int) $invoice_id;
        $invoice = Invoice::where('id', $invoice_id)->with('client')->first();

        $pdf = \PDF::loadView('invoice', compact('company', 'invoice'));
        $pdf->setPaper('A4', 'portrain');
        return $pdf->download('invoice.pdf');
    }
}
