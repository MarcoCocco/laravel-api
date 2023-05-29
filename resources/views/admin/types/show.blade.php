@extends('layouts/admin')

@section('content')
    <div class="container">
        <h2 class="text-center m-4">Tutti i progetti di tipologia {{ $type->name }}</h2>
        <div class="back-to-list text-center mb-4">
            <a href="{{ route('admin.types.index') }}"><i class="fa-solid fa-left-long"></i> Torna alla lista</a>
        </div>
        @if (count($type->projects) > 0)
            <div class="row">
                @foreach ($type->projects as $project)
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->title }}</h5>
                                <hr>
                                <p class="card-text">{{ $project->description }}</p>
                                <div class="text-center">
                                    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary">
                                        Vai al progetto
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center p-4">La tipologia {{ $type->name }} non ha nessun progetto associato.</p>
        @endif

        <div class="d-flex justify-content-center gap-4">
            <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-primary">Modifica</a>

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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina la tipologia</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare la tipologia?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
