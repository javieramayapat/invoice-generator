<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<STYLE type="text/css">
    p,
    td,
    th {
        font-size: 13px;
    }

    body {
        background: #ffff;
    }

</STYLE>

<body>
    <main>

        <div class="row justify-content-center">
            <div class="col text-center">
                <h3>{{ $company->company_name }}</h3>
                <p>
                    {{ $company->rfc }},<br>
                    {{ $company->email }},<br>
                    {{ $company->address }}
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 text-left">
                <p>
                    Nombre del cliente: {{ $invoice->client->name }}
                    {{ $invoice->client->first_surname }}
                    {{ $invoice->client->second_surname }} <br>

                    RFC: {{ $invoice->client->rfc }} <br>
                    Email: {{ $invoice->client->email }} <br>
                    Direccion: {{ $invoice->client->address }} <br>
                </p>

            </div>
            <div class="col-md-6 text-right">
                <p>
                    No. Factura: {{ $invoice->id }} <br>
                    Fecha de expedición: {{ $invoice->created_at->format('d/m/Y') }} <br>
                    Fecha de Vencimiento: {{ $invoice->created_at->format('d/m/Y') }}
                </p>
            </div>

        </div>
        <h4>Detalles de Compra</h4>
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Descripción del producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Importe</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoice->products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->amount_of_pieces }}</td>
                            <td>$ {{ $product->value }}</td>
                            <td> ${{ calculateAmount($product->value, $product->pivot->amount_of_pieces) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="row float-right">
                <div class="col-md-12 mr-5">
                    <strong>Subtotal:</strong> ${{ calculateSubtotal($invoice) }} <br>
                    <strong>IVA (16%) :</strong> ${{ calculateIvaToPayByProduct($invoice) }} <br>
                    <strong>Total:</strong> ${{ calculateTotal($invoice) }}

                </div>

            </div>
        </div>

    </main>

</body>

</html>
