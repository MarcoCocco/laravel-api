@extends('layouts/admin')

@section('content')
    <h1 class="m-4 text-center">Modifica una tecnologia</h1>
    <div class="back-to-list text-center mb-4">
        <a href="{{ route('admin.technologies.show', $technology) }}"><i class="fa-solid fa-left-long"></i> Torna indietro</a>
    </div>
    <form action="{{ route('admin.technologies.update', $technology) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') ?? $technology->name }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="description">Colore da associare al badge</label>
            <input type="text" name="color" id="color" cols="30" rows="10"
                class="form-control  @error('color') is-invalid @enderror" value="{{ old('color') ?? $technology->color }}">
            @error('color')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Modifica</button>
    </form>
@endsection