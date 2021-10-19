<?php

use App\Models\Invoice;

/**
 * calculate amount of product purchased
 *
 * @param float $unitPrice
 * @param integer $amount_of_pieces
 * @return amount Result of the multiplication of the number of pieces by the unit price
 */
function calculateAmount(float $unitPrice, int $amount_of_pieces)
{
    $amount = $unitPrice * $amount_of_pieces;
    return $amount;
}

/**
 * Calculate Subtotal of all products
 *
 * @param integer $invoice_id
 * @return summation
 */
function calculateSubtotal(Invoice $invoice)
{
    $subtotal = 0;

    foreach ($invoice->products as $product) {
        $subtotal += calculateAmount($product->value, $product->pivot->amount_of_pieces);
    }

    return (float) $subtotal;
}

/**
 * Calculate Iva to pay by Product
 *
 * @param Invoice $invoice
 * @return void
 */
function calculateIvaToPayByProduct(Invoice $invoice)
{
    return (float) calculateSubtotal($invoice) * 0.16;
}

/**
 * Calculate total of invoice
 *
 * @param Invoice $invoice
 * @return void
 */
function calculateTotal(Invoice $invoice)
{
    return calculateSubtotal($invoice) + calculateIvaToPayByProduct($invoice);
}

/**
 * Get the first invoice
 *
 * @param int $invoice_id
 * @return Invoice
 */
function getInvoice($invoice_id)
{
    $invoice_id = (int) $invoice_id;
    $invoice = Invoice::where('id', $invoice_id)->first();

    return $invoice;
}

/**
 * Get last Invoice
 *
 * @return last_invoice
 */
function getLastInvoiceId()
{
    $last_invoice_id = Invoice::all()->last()->id;
    return $last_invoice_id;
}
