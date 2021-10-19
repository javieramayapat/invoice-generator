<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceProductController extends Controller
{
    public function attachProduct(Request $request, $invoice_id)
    {
        $invoice_id = (int) $invoice_id;
        $invoice = Invoice::where('id',$invoice_id)->first();

        $product_id = (int) $request['product_id'];
        $amount_of_pieces = (int) $request['amount_of_pieces'];

        $invoice->products()->attach($product_id, ['amount_of_pieces' => $amount_of_pieces]);

        return back()->with('status', 'Agregado Correctamente');
    }

    public function dettachProduct($invoice_id, $product_id)
    {
        $invoice = getInvoice($invoice_id);
        $product_id = (int) $product_id;

        $invoice->products()->detach($product_id);
        return back()->with('status', 'Eliminado Correctamente');
    }
}
