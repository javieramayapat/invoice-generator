@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Facturas
                        <a href="{{ route('invoice.create') }}" class="btn btn-sm btn-success float-right">Nueva Factura</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-light table-hover table-responsive-md">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>RFC</th>
                                    <th>Cliente</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <td>{{ $invoice->id }}</td>
                                        <td>{{ $invoice->client->rfc }}</td>
                                        <td>{{ $invoice->client->name }} {{ $invoice->client->first_surname }}</td>
                                        <td>
                                            <form action="{{ route('downloadPdfInvoice', $invoice->id) }}" method="post">
                                                @csrf
                                                <input type="submit" value="Descargar" class="btn btn-sm btn-danger">
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('pdfInvoice', $invoice->id) }}" method="post">
                                                @csrf
                                                <input type="submit" value="Ver PDF" class="btn btn-sm btn-primary">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $invoices->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
