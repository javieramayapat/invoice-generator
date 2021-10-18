@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Clientes
                        <a href="{{ route('clients.create') }}" class="btn btn-sm btn-success float-right">Crear</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-light table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre del cliente</th>
                                    <th>RFC</th>
                                    <th>Correo</th>
                                    <th>Dirección</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>
                                            {{ $client->name }}
                                            {{ $client->first_surname }}
                                            {{ $client->second_surname }}
                                        </td>
                                        <td>{{ $client->rfc }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->address }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary"
                                                href="{{ route('clients.edit', $client) }}">Editar</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('clients.destroy', $client) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input class="btn btn-sm btn-danger" type="submit" value="Eliminar"
                                                    onclick="return confirm('¿Desea eliminar al cliente {{ $client->name }}?')">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $clients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
