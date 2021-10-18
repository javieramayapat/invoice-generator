@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Cliente</div>

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

                        <form action="{{ route('clients.store') }}" method="post">

                            <div class="form-group">
                                <label for="name">Nombre*</label>
                                <input class="form-control" type="text" name="name">
                            </div>

                            <div class="form-group">
                                <label for="name">Primer Apellido*</label>
                                <input class="form-control" type="text" name="first_surname">
                            </div>

                            <div class="form-group">
                                <label for="name">Segundo Apellido*</label>
                                <input class="form-control" type="text" name="second_surname">
                            </div>

                            <div class="form-group">
                                <label for="name">RFC*</label>
                                <input class="form-control" type="text" name="rfc">
                            </div>

                            <div class="form-group">
                                <label for="name">Dirección*</label>
                                <input class="form-control" type="text" name="address">
                            </div>

                            <div class="form-group">
                                <label for="name">Correo*</label>
                                <input class="form-control" type="email" name="email">
                            </div>

                            <div class="form-group">
                                @csrf
                                <input type="submit" value="Guardar" class="btn btn-sm btn-primary">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
