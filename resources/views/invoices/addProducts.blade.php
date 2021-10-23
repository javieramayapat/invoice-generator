@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card text-center bg-white">
                        <div class="col-md-12">
                            <h2><strong>{{ $company->company_name }}</strong></h2>
                            <p>
                                {{ $company->rfc }},<br>
                                {{ $company->email }},<br>
                                {{ $company->address }}
                            </p>
                        </div>

                        <div class="row">
                            {{-- usuario --}}
                            <div class="col-md-6">
                                <p>
                                    Nombre del cliente: {{ $invoice->client->name }}
                                    {{ $invoice->client->first_surname }}
                                    {{ $invoice->client->second_surname }} <br>

                                    RFC: {{ $invoice->client->rfc }} <br>
                                    Email: {{ $invoice->client->email }} <br>
                                    Direccion: {{ $invoice->client->address }} <br>
                                </p>

                            </div>
                            {{-- Factura --}}
                            <div class="col-md-6">
                                <p>
                                    No. Factura: {{ $invoice->id }} <br>
                                    Fecha de expedición: {{ $invoice->created_at->format('d/m/Y') }} <br>
                                    Fecha de Vencimiento: {{ $invoice->created_at->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        {{-- Add products to invoice --}}
                        <form action="{{ route('attachProducts', $invoice->id) }}" method="post">

                            <div class="row">
                                {{-- Lista de productos --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product">Productos</label>
                                        <select name="product_id" class="form-control">
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">
                                                    {{ $product->name }}
                                                    {{ $product->value }}
                                            @endforeach
                                    </div>
                                </div>


                                {{-- Cantidad de piezas --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="amount_of_pieces">Cantidad de piezas</label>
                                        <input type="number" min="1" value="1" name="amount_of_pieces"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        @csrf
                                        <input type="submit" value="Agregar" class="btn btn-sm btn-primary">
                                    </div>
                                </div>

                            </div>
                        </form>

                        {{-- Listar productos de tabla intermedia --}}
                        <div class="row">
                            <table class="table table-striped table-hover text-center table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>Descripción del producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unitario</th>
                                        <th>Importe</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoice->products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->pivot->amount_of_pieces }}</td>
                                            <td>$ {{ $product->value }}</td>
                                            <td> ${{ calculateAmount($product->value, $product->pivot->amount_of_pieces) }}
                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('dettachProducts', [$invoice->id, $product->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="submit" value="Quitar" class="btn btn-sm btn-danger">
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- Fin lista de productos join table --}}

                        <div class="row float-right">
                            <div class="col-md-12 mr-5">

                                <strong>Subtotal:</strong> ${{ calculateSubtotal($invoice) }} <br>
                                <strong>IVA (16%) :</strong> ${{ calculateIvaToPayByProduct($invoice) }} <br>
                                <strong>Total:</strong> ${{ calculateTotal($invoice) }}

                            </div>
                            <div class="col-md-3 mt-3">
                                <form action="{{ route('pdfInvoice', $invoice->id) }}" method="POST">
                                    @csrf
                                    <input type="submit" value="Generar Factura" class="btn btn-sm btn-primary">
                                </form>
                            </div>

                            <div class="col-md-5 mt-3">
                                <a href="{{ route('invoice.index') }}" class="btn btn-sm btn-success">Nueva
                                    Factura</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
