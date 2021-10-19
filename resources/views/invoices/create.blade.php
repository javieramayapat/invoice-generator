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
                    </div>

                    <div class="card-body">
                        {{-- Form to create invoice OK --}}
                        <form action="{{ route('invoice.store') }}" method="post" class="form-inline">


                            <label for="clients">Clientes: </label>
                            <select name="client_id" class="form-control form-inline ml-2">
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">
                                        {{ $client->name }}
                                        {{ $client->first_surname }}
                                        {{ $client->second_surname }}</option>
                                @endforeach
                            </select>

                            <div class="form-group ml-3">
                                @csrf
                                <input type="submit" value="Continuar" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
