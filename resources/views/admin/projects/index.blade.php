@extends('layouts/admin')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center m-4">Lista dei Progetti</h2>
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <hr>
                            <p class="card-text">{{ $project->description }}</p>
                            <p class="card-text"><strong>Tipo di progetto:</strong>
                                {{ $project->type->name ?? 'Non specificato' }}</p>
                            <p class="card-text">
                                <strong>Tecnologie:</strong>
                                @if (count($project->technologies) > 0)
                                    @foreach ($project->technologies as $index => $technology)
                                        {{ $technology->name }}
                                        @if ($index !== count($project->technologies) - 1)
                                            ,
                                        @endif
                                    @endforeach
                                @else
                                    Non specificate
                                @endif
                            </p>
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary">
                                <i class="fas fa-search"></i> Visualizza dettagli
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-around m-4">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
            Aggiungi un progetto
        </a>
    </div>
@endsection
