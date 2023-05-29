@extends('layouts/admin')

@section('content')
    <div class="container">
        <h2 class="text-center m-4">Tecnologie del Progetto</h2>
        <div class="row">
            @foreach ($technologies as $technology)
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $technology->name }}</h5>
                            <hr>
                            <p class="card-text">{{ $technology->color }}</p>
                            <p class="card-text">Numero di progetti: {{ count($technology->projects) }}</p>
                            <a href="{{ route('admin.technologies.show', $technology) }}" class="btn btn-primary">
                                <i class="fas fa-search"></i> Visualizza dettagli
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-around m-4">
        <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary">
            Aggiungi una tecnologia di progetto
        </a>
    </div>
@endsection