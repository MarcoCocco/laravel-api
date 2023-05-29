@extends('layouts/admin')

@section('content')
    <div class="container">
        <h1 class="text-center mt-4">Dettagli Progetto</h1>
        <div class="back-to-list text-center mb-4">
            <a href="{{ route('admin.projects.index') }}"><i class="fas fa-long-arrow-alt-left"></i> Torna alla lista</a>
        </div>

        <div class="card mx-auto" style="width: 50%;">
            <img src="{{ asset('storage/' . $project->project_image) }}" class="card-img-top" alt="img">
            <div class="card-body">
                <h3 class="card-title text-center">
                    {{ $project->title }}
                </h3>
                <hr>
                <p class="card-text">
                    {{ $project->description }}
                </p>
                <hr>
                <ul class="list-group">
                    <li class="list-group-item">
                        <p><strong>Link alla Repository:</strong></p> {{ $project->github_link }}
                    </li>
                    <li class="list-group-item">
                        <p><strong>Tipo di Progetto:</strong> </p>{{ $project->type->name ?? 'Non specificato' }}
                    </li>
                    <li class="list-group-item">
                        <p><strong>Data di creazione:</strong> </p>{{ $project->creation_date }}
                    </li>
                    <li class="list-group-item">
                        <p><strong>Completo:</strong></p> {{ $project->is_complete ? 'Sì' : 'No' }}
                    </li>
                </ul>
                <hr>
                <div class="text-center">
                    <h6>Tecnologie</h6>
                    <div class="row">
                        <div class="col">
                            <div class="d-flex flex-wrap justify-content-center">
                                @if (count($project->technologies) > 0)
                                    @foreach ($project->technologies as $technology)
                                        <span class="badge rounded-pill mx-1"
                                            style="background-color: {{ $technology->color }}">{{ $technology->name }}</span>
                                    @endforeach
                                @else
                                    <p>Non specificate</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center gap-4 p-4">
            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary">Modifica</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Elimina
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il progetto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare il progetto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
