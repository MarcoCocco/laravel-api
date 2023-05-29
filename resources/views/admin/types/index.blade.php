@extends('layouts/admin')

@section('content')
    <div class="container">
        <h2 class="text-center m-4">Tipologie di Progetto</h2>
        <div class="row">
            @foreach ($types as $type)
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $type->name }}</h5>
                            <hr>
                            <p class="card-text">{{ $type->description }}</p>
                            <p class="card-text">Numero di progetti: {{ count($type->projects) }}</p>
                            <a href="{{ route('admin.types.show', $type) }}" class="btn btn-primary">
                                <i class="fas fa-search"></i> Visualizza dettagli
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-around m-4">
        <a href="{{ route('admin.types.create') }}" class="btn btn-primary">
            Aggiungi una tipologia di progetto
        </a>
    </div>
@endsection
