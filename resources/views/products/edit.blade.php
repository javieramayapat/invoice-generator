@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Producto</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('products.update', $product) }}" method="post">

                            <div class="form-group">
                                <label for="name">Nombre del producto*</label>
                                <input class="form-control" type="text" name="name" id="" required
                                    value="{{ old('name', $product->name) }}">
                            </div>

                            <div class="form-group">
                                <label for="name">Precio del Producto*</label>
                                <input class="form-control" type="number" name="value" min="0" required
                                    value="{{ old('value', $product->value) }}">
                            </div>

                            <div class="form-group">
                                @csrf
                                @method('PUT')
                                <input type="submit" value="Actualizar" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
