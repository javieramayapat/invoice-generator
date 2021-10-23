<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::orderBy('id', 'DESC')->paginate(5);
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = User::find(Auth::user()->id);
        $company  = Company::all()->last();
        $products = Product::all();
        $clients  = Client::orderBy('id', 'DESC')->get();

        return view('invoices.create', compact('employee', 'company', 'clients', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = User::find(Auth::user()->id);
        $employee_id = $employee->id;


        $company_id  = Company::all()->last()->id;
        $client_id   = (int) $request['client_id'];

        $invoice =  new Invoice();

        $invoice->pdf_url = Null;
        $invoice->user_id = $employee_id;
        $invoice->client_id = $client_id;
        $invoice->company_id = $company_id;
        $invoice->save();

        return redirect()->route('add-products', ['id' => getLastInvoiceId()]);

    }

    public function addProducts($invoice_id){

        $invoice = Invoice::where('id',$invoice_id)->with('products')->first();
        $employee = User::find(Auth::user()->id);
        $company  = Company::all()->last();
        $products = Product::all();
        $clients  = Client::orderBy('id', 'DESC')->get();

        return view('invoices.addProducts',compact('employee', 'company', 'invoice', 'products'));
    }



}
