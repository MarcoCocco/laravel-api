@extends('layouts/admin')

@section('content')
    <h1 class="m-4 text-center">Modifica una tipologia</h1>
    <div class="back-to-list text-center mb-4">
        <a href="{{ route('admin.types.show', $type) }}"><i class="fa-solid fa-left-long"></i> Torna indietro</a>
    </div>
    <form action="{{ route('admin.types.update', $type) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') ?? $type->name }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description">Descrizione</label>
            <textarea name="description" id="description" cols="30" rows="10"
                class="form-control  @error('description') is-invalid @enderror">{{ old('description') ?? $type->description }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Modifica</button>
    </form>
@endsection
