@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Productos
                        <a href="{{ route('products.create') }}" class="btn btn-sm btn-success float-right">Crear</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-light table-hover table-responsive-md">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre del producto</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->value }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary"
                                                href="{{ route('products.edit', $product) }}">Editar</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input class="btn btn-sm btn-danger" type="submit" value="Eliminar"
                                                    onclick="return confirm('¿Desea eliminar el producto {{ $product->name }}?')">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
