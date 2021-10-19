<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceProductController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('products', 'ProductController');
Route::resource('clients', 'ClientController');
Route::resource('invoice', 'InvoiceController');

Route::get('add-products/{id}', 'InvoiceController@addProducts')->name('add-products');
Route::post('attach-products/{invoice_id}', 'InvoiceProductController@attachProduct')->name('attachProducts');
Route::post('dettach-products/{invoice_id}/{product_id}', 'InvoiceProductController@dettachProduct')->name('dettachProducts');

//PDF
Route::post('invoicePdf/{invoice_id}', 'PdfController@pdfInvoice')->name('pdfInvoice');
Route::post('downloadInvoicePdf/{invoice_id}', 'PdfController@downloadPdfInvoice')->name('downloadPdfInvoice');


Route::get('/home', 'HomeController@index')->name('home');
